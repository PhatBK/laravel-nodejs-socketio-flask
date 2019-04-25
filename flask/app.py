from flask import Flask
from flask import jsonify
from sklearn import datasets
import numpy as np


app = Flask(__name__)

app.config['TESTING'] = True

def add_tow(n1, n2):
    return n1 + n2

def sklearn_test():
    iris = datasets.load_iris()
    digits = datasets.load_digits()
    return digits.data
def create_matrix_nd(n,m, range):
    a = np.arange(range).reshape(n, m)
    return a

@app.route('/')
def hello_world():
    mx = np.random.randint(5, size=(40, 20))
    # mx_ = np.where(mx == 0, 'NAN', mx)
    print(mx)
    return "Successfully"


@app.route('/api/get/data/v1')
def get_data_api():
    data = [1,2,3,4,5]
    return jsonify(data)
if __name__ == '__main__':
    app.run()
