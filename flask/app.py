#!/usr/bin/env python
# coding=utf-8
from flask import Flask
from flask import jsonify
from flask_restful import Resource, Api
from flask_cors import CORS

from sklearn import datasets
import numpy as np
import json
import requests

app = Flask(__name__)
app.config['TESTING'] = True

CORS(app)

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
    task = {"summary": "Take out trash", "description": "" }

    requests.post('http://127.0.0.1/DATN-20182/public/api/call/flask',  data=json.dumps(task),headers={'Content-Type':'application/json'})
    return jsonify(data.json())





if __name__ == '__main__':
    app.run()
