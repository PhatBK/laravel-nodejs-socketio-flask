#!/usr/bin/env python
# coding=utf-8
from flask import Flask
from flask import jsonify
import requests
import pandas as pd

import matplotlib.pyplot as plt

from recommendation_data import dataset
from collaborative_filtering import user_reommendations

app = Flask(__name__)
app.config['TESTING'] = True


# TODO recommend algorithm
# print(pd.DataFrame(dataset))

# TODO api recived and send data
@app.route('/')
def hello_world():
    return "Hello World, Welcome Flask API"

@app.route('/data/get/all/v1')
def get_all_data_web_app():
    host = 'http://127.0.0.1'
    dir_root = 'DATN-20182'
    api_pre = '/public/api/data/'
    rate_json = requests.get('http://127.0.0.1/DATN-20182/public/api/data/rate/matrix/v1')
    like_json = requests.get('http://127.0.0.1/DATN-20182/public/api/data/like/matrix/v1')
    search_json = requests.get('http://127.0.0.1/DATN-20182/public/api/data/search/matrix/v1')
    watched_json = requests.get('http://127.0.0.1/DATN-20182/public/api/data/implict/matrix/v1')

    rate_matrix = pd.read_json(rate_json.text)
    like_matrix = pd.read_json(like_json.text)
    search_matrix = pd.read_json(search_json.text)
    watched_matrix = pd.read_json(watched_json.text)


    print(rate_matrix.corr('pearson', 1).replace(to_replace = float('nan'),value = -2))
    # print(watched_matrix.corr('pearson', 1).replace(to_replace = float('nan'),value = -2))

    # matrix_total = 10 * rate_matrix.corr('pearson', 1) + 20 * search_matrix.corr('pearson', 1) + watched_matrix.corr('pearson', 1)
    # print(matrix_total)
    # pd.to_numeric(rate_matrix, errors='ignore')
    # print(rate_matrix)

    # data_all_matrix = 2 * rate_matrix + 4 * like_matrix + 1 / 3600 * watched_matrix
    # print(data_all_matrix)
    # plt.hist(data_all_matrix)
    # plt.show()

    return "SuccessFully"

get_all_data_web_app()


@app.route('/api/response/data/recommended')
def get_data_api():
    result = {}
    for predict in dataset:
        result[predict] = user_reommendations(predict)
    return jsonify(result)

if __name__ == '__main__':
    app.run()
