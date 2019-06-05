#!/usr/bin/env python
# coding=utf-8
# libs
from flask import Flask
from flask import jsonify
import numpy as np
import scipy
from scipy.sparse import csc_matrix
import schedule
import time
import matplotlib.pyplot as plt
from sklearn.neighbors import NearestNeighbors
from sklearn.metrics import jaccard_similarity_score
from sklearn.metrics.pairwise import pairwise_distances
from scipy.spatial.distance import squareform
from scipy.spatial.distance import pdist, jaccard
from scipy.spatial.distance import cdist
# my-code
# from recommendation_data import dataset
# from collaborative_filtering import user_reommendations
import requests
import json
import pandas as pd
from datetime import date, datetime
from apscheduler.scheduler import Scheduler


app = Flask(__name__)
app.config['TESTING'] = True

sched = Scheduler() # Scheduler object
sched.start()

global share_data
share_data = None
global file_name_item_recommended
file_name_item_recommended = None
global finish_caculator
finish_caculator = None
global time_scheduler
time_scheduler = 15

global time_start_recommend
time_start_recommend = "Time start:" + str(datetime.now())
print(time_start_recommend)


@app.route('/')
def hello_world():
    return "Hello World, Welcome Flask API"


@app.route('/api/caculator/recommend/CF_item_item/v1', methods=["GET", "POST"])
def recommend_CF_item_item():
    print("Start Caculator Recommendation...")
    today = date.today()
    now = datetime.now()
    path_simmilarity = 'simmilarity/' + \
                       str(today.year) + '-' + \
                       str(today.month) + '-' + \
                       str(today.day) + 'T' + \
                       str(now.strftime("%H")) + '-' + \
                       str(now.strftime("%M")) + \
                       '_item_item_sim.csv'
    # get data from web-app server
    rate_json = requests.get('http://127.0.0.1/DATN-20182/public/api/data/rate/matrix/v1')
    like_json = requests.get('http://127.0.0.1/DATN-20182/public/api/data/like/matrix/v1')
    search_json = requests.get('http://127.0.0.1/DATN-20182/public/api/data/search/matrix/v1')
    watched_json = requests.get('http://127.0.0.1/DATN-20182/public/api/data/implict/matrix/v1')

    # build matrix user-item behavior
    rate_matrix = pd.read_json(rate_json.text)
    like_matrix = pd.read_json(like_json.text)
    search_matrix = pd.read_json(search_json.text)
    watched_matrix = pd.read_json(watched_json.text)

    # print(rate_matrix.index)
    # print(rate_matrix.columns)

    # Caculator simmilarity of item-item for pearson
    rate_item_simmilarity = rate_matrix.corr('pearson', 1).replace(to_replace=float('nan'), value=0)
    search_item_simmilarity = search_matrix.corr('pearson', 1).replace(to_replace=float('nan'), value=0)
    watched_item_simmilarity = watched_matrix.corr('pearson', 1).replace(to_replace=float('nan'), value=0)
    # jaccard simmilarity
    res = pdist(like_matrix[like_matrix.columns].T, 'jaccard')
    squareform(res)
    distance = 1 - pd.DataFrame(squareform(res), index=like_matrix.columns, columns=like_matrix.columns)
    like_item_simmilarity = distance.replace(to_replace=float('nan'), value=0)


    # Integrate matrixs item-item simmilarity
    final_iteim_similarity = 1 / 9 * (4 * rate_item_simmilarity + watched_item_simmilarity + 2 * search_item_simmilarity + 2 * like_item_simmilarity)

    number_column = len(final_iteim_similarity.index)
    i = 0
    response_data = {}
    for col in final_iteim_similarity:
        i+=1
        _item = col
        _item_simmilarity = final_iteim_similarity[col].sort_values(ascending=False)
        k_NN_items = _item_simmilarity.loc[_item_simmilarity > 0]

        length = k_NN_items.size
        if length > 15:
            k_NN_item__ = k_NN_items[0:15]
            response_data[str(col)] = str(k_NN_item__.index.tolist())
        else:
            response_data[str(col)] = str(k_NN_items.index.tolist())

        # k_NN_items = _item_simmilarity.loc[_item_simmilarity > 0]
        # response_data[str(col)] = str(k_NN_items.index.tolist())
        # response_data[str(col)] = k_NN_items.index.tolist()

    # save matrix simmilarity to file .csv
    final_iteim_similarity.to_csv(path_simmilarity, sep=',', encoding='utf-8')

    global share_data
    share_data = response_data
    now_recommended = datetime.now()
    global file_name_item_recommended
    file_name_item_recommended = "recommended" + "/" +  \
                                 str(now_recommended.year) + \
                                 str(now_recommended.month) + \
                                 str(now_recommended.day) + \
                                 str(now.strftime("%H")) + \
                                 str(now.strftime("%M")) + \
                                 "_item_recommended.json"
    with open(file_name_item_recommended, 'w') as json_file:
        json.dump(json.dumps(response_data), json_file)

    global finish_caculator
    finish_caculator = True
    print("Finish Caculator Recommendation...")
    return "Successfully finished recommendation caculator..."


@app.route('/api/caculator/recommend/CF_user_user/v1')
def recommend_CF_user_user():

    return "Success"

# use libs scikit-learn
@app.route('/api/caculator/use/sikit-leaarn')
def get_recommendation_item_base_libs():
    rate_json = requests.get('http://127.0.0.1/DATN-20182/public/api/data/rate/matrix/v1')
    like_json = requests.get('http://127.0.0.1/DATN-20182/public/api/data/like/matrix/v1')
    search_json = requests.get('http://127.0.0.1/DATN-20182/public/api/data/search/matrix/v1')
    watched_json = requests.get('http://127.0.0.1/DATN-20182/public/api/data/implict/matrix/v1')

    # build matrix user-item behavior
    rate_matrix = pd.read_json(rate_json.text)
    like_matrix = pd.read_json(like_json.text)
    search_matrix = pd.read_json(search_json.text)
    watched_matrix = pd.read_json(watched_json.text)
    # use scikit-learn libs
    rate_matrix_normal = rate_matrix.replace(to_replace=float('nan'), value=0).values
    # rate_matrix_normal = rate_matrix.replace(to_replace=float('nan'), value=0)
    nbrs = NearestNeighbors(n_neighbors=15, algorithm='ball_tree').fit(rate_matrix_normal.T)
    distances, indices = nbrs.kneighbors(rate_matrix_normal.T)
    # print(distances)
    # print(indices)
    for i in range(0, 50):
        # print(np.asarray(rate_matrix_normal[col].tolist()))
        # print(rate_matrix_normal[col].tolist())
        neighors = nbrs.kneighbors([np.asarray(rate_matrix_normal[:, i].tolist())], n_neighbors=15,
                                   return_distance=False)
        print(neighors)
        print("------------")
        if i == 10: break
    # end use scikit-learn libs
    return "Success scikit-learn..."


@app.route('/api/response/data/recommended/post',  methods=["POST"])
def post_data_recommended():
    print("Start Post Recommended data for Web App Server...")
    global share_data
    if share_data == None:
        global file_name_item_recommended
        data = None
        with open(file_name_item_recommended) as json_file:
            data = json.load(json_file)
        return data
    return json.dumps(share_data)


@app.route('/scheduler/start/item_based')
def scheduler_item_based_start():
    recommend_CF_item_item()
    global finish_caculator
    if finish_caculator == True:
        print("Scheduler Running...")
        res_scheduler = requests.get('http://127.0.0.1/DATN-20182/public/api/get/recommended/item-base/v1')
        if res_scheduler.status_code < 300:
            print("Successfully Post Data ...")
            time_finish = "Time finish:" + str(datetime.now())
            print(time_finish)
        else:
            print("Unsuccessfully Post Data...")
        return "Scheduler Caculator Recommendation engine"
    return "Recommendation Engine Error..."


@app.route('/scheduler/start/rank/monan/v1')
def scheduler_rank_monan():
    print("Scheduler Running...")
    res_scheduler = requests.get('http://127.0.0.1/DATN-20182/public/api/rank/monan/date/v1')
    if res_scheduler.status_code < 300:
        print("Ranking monan successfully...")
    else:
        print("Ranking monan Unsuccessfully...")
    return "Success"


@app.errorhandler(500)
def server_error_handler():
    return "500 Server Error"


sched.add_interval_job(scheduler_rank_monan, minutes=5)
sched.add_interval_job(scheduler_item_based_start, minutes=time_scheduler)


if __name__ == '__main__':
    app.run()
