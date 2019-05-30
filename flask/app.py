#!/usr/bin/env python
# coding=utf-8
from flask import Flask
from flask import jsonify
import requests
import json
import numpy as np
import pandas as pd
from datetime import date, datetime
import matplotlib.pyplot as plt
from recommendation_data import dataset
from collaborative_filtering import user_reommendations


app = Flask(__name__)
app.config['TESTING'] = True

items_recommended = {}

@app.route('/')
def hello_world():
    return "Hello World, Welcome Flask API"

@app.route('/data/get/all/v1')
def get_all_data_web_app():
    today = date.today()
    now = datetime.now()
    path_simmilarity = 'simmilarity/' + \
                       str(today.year) + '-' + \
                       str(today.month) + '-' + \
                       str(today.day) + 'T' + \
                       str(now.strftime("%H")) + '-' + \
                       str(now.strftime("%M")) + \
                       '_item_item_sim.csv'
    # get data
    rate_json = requests.get('http://127.0.0.1/DATN-20182/public/api/data/rate/matrix/v1')
    like_json = requests.get('http://127.0.0.1/DATN-20182/public/api/data/like/matrix/v1')
    search_json = requests.get('http://127.0.0.1/DATN-20182/public/api/data/search/matrix/v1')
    watched_json = requests.get('http://127.0.0.1/DATN-20182/public/api/data/implict/matrix/v1')
    # build matrix user-item behavior
    rate_matrix = pd.read_json(rate_json.text)
    like_matrix = pd.read_json(like_json.text)
    search_matrix = pd.read_json(search_json.text)
    watched_matrix = pd.read_json(watched_json.text)

    # Caculator simmilarity of item-item for pearson
    # rate_item_simmilarity = rate_matrix.corr('pearson', 1).replace(to_replace=float('nan'), value=-2)
    # search_item_simmilarity = search_matrix.corr('pearson', 1).replace(to_replace=float('nan'), value=-2)
    # watched_item_simmilarity = watched_matrix.corr('pearson', 1).replace(to_replace=float('nan'), value=-2)

    # Caculator simmilarity of item-item for pearson
    rate_item_simmilarity = rate_matrix.corr('pearson', 1).replace(to_replace=float('nan'), value=0)
    search_item_simmilarity = search_matrix.corr('pearson', 1).replace(to_replace=float('nan'), value=0)
    watched_item_simmilarity = watched_matrix.corr('pearson', 1).replace(to_replace=float('nan'), value=0)

    # Integrate matrixs item-item simmilarity
    # final_iteim_similarity = rate_item_simmilarity
    final_iteim_similarity = 1 / 7 * (4 * rate_item_simmilarity + watched_item_simmilarity + 2 * search_item_simmilarity)

    # save matrix simmilarity to file .csv
    # final_iteim_similarity.to_csv(path_simmilarity, sep=',', encoding='utf-8')

    number_column = len(final_iteim_similarity.index)
    i = 0
    response_data = {}
    for col in final_iteim_similarity:
        i+=1
        _item = col
        _item_simmilarity = final_iteim_similarity[col].sort_values()

        # print(_item_simmilarity.to_json())
        # arr = _item_simmilarity.values
        # print(_item_simmilarity.where(_item_simmilarity > 0))
        k_NN_items = _item_simmilarity.loc[_item_simmilarity > 0]
        # print(k_NN_items)
        # print(k_NN_items.index)
        # print(k_NN_items.values)
        print(np.asarray(k_NN_items.index))
        response_data[str(col)] = str(np.asarray(k_NN_items.index))
        # print(_item_simmilarity.where(_item_simmilarity > 0).to_json())
        print('-----------------------------------------------')

    return jsonify(response_data)


@app.route('/api/response/data/recommended/post')
def post_data_recommended():
    return "Success"
# get_all_data_web_app()


@app.route('/api/response/data/recommended')
def get_data_api():
    result = {}
    for predict in dataset:
        result[predict] = user_reommendations(predict)
    print(result)
    return "SuccessFully"

# get_data_api()

if __name__ == '__main__':
    app.run()
