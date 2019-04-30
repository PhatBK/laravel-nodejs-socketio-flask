#!/usr/bin/env python
# coding=utf-8
from flask import Flask
from flask import jsonify
# from flask_restful import Resource, Api
# from flask_cors import CORS

from sklearn import datasets
import numpy as np
import json
import requests

# ToDo Recommender engine task
from recommendation_data import dataset
import collaborative_filtering


print('Lisa de similaryty:')
print(collaborative_filtering.most_similar_users('Lisa Rose', 4, dataset))
print("Recommendations for Lisa Rose:")
print(collaborative_filtering.user_reommendations_knn('Lisa Rose', dataset, 0.8))


app = Flask(__name__)
app.config['TESTING'] = True

# CORS(app)
print(datasets)
def add_tow(n1, n2):
    return n1 + n2

def sklearn_test():
    iris = datasets.load_iris()
    digits = datasets.load_digits()
    return digits.data
def create_matrix_nd(n,m, range):
    a = np.arange(range).reshape(n, m)
    return a

def call_api_get():
    data = {}
    return data

def call_api_post():
    data = {}
    return data

@app.route('/')
def hello_world():
    mx = np.random.randint(5, size=(40, 20))
    # mx_ = np.where(mx == 0, 'NAN', mx)
    # print(mx)
    return "Successfully"

@app.route('/api/start/recommender/v1')
def start_recommend():
    data = requests.get('http://127.0.0.1/DATN-20182/public/api/send/flask');
    print(data.json())
    # tính toán recommend
    # Todo
    results = {
        'code': 200,
        'type': 'array',
        'data': jsonify([1,2,3,4,5,6,7])
    }
    # gửi lại dữ liệu cho server web app
    data_send = requests.post('http://127.0.0.1/DATN-20182/public/api/recommender/flask/post/results', data = results);
    print(data_send)
    return "Successfully"

@app.route('/api/data/get/v1')
def get_data_api():
    data = [1,2,3,4,5]
    return jsonify(data)

@app.route('/call/api/am-thuc-quanh-ta')
def get_data_api_amthucquanhta():
    data = requests.get('http://127.0.0.1/DATN-20182/public/api/send/flask');
    print(data)
    print(data.status_code)
    print(data.json())

    # task = {"summary": "Take out trash", "description": "" }
    # requests.post('http://127.0.0.1/DATN-20182/public/api/call/flask',  data=json.dumps(task),headers={'Content-Type':'application/json'})
    return jsonify(data.json())
@app.route('')
def func_utils():
    return "";




if __name__ == '__main__':
    app.run()
