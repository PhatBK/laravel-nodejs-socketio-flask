#!/usr/bin/env python
# coding=utf-8
from flask import Flask
from flask import jsonify
from sklearn import datasets
import numpy as np
import requests

app = Flask(__name__)
app.config['TESTING'] = True

# TODO recommend algorithm




# TODO api recived and send data
@app.route('/')
def hello_world():
    return "Successfully"

@app.route('/api/start/recommender/v1')
def start_recommend():
    data = requests.get('http://127.0.0.1/DATN-20182/public/api/data/rate/v1');
    print(data.json())
    return "Successfully"

@app.route('/api/test')
def get_data_api():
    data = [1,2,3,4,5]
    return jsonify(data)

if __name__ == '__main__':
    app.run()
