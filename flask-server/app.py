from flask import Flask
from flask import jsonify
from flask import  request

app = Flask(__name__)


@app.route('/')
def hello_world():
    return 'Hello World!'
@app.route('/api/get/all-data/')
def get_all_data() :
    return "API response"
@app.route('/api/post/recommender/v1')
def post_recommend_data() :
    result = {
        'id': 1,
        'data': ['item1', 'item2', 'item3', 'item4']
    }
    return jsonify(result)
@app.route('/api/call/web-app/v1')
def api_call_web_app() :
    datas = request.get('http://127.0.0.1/bkcook.vn/public/api/recommender/get-all/data')
    return  jsonify(datas)
@app.route('/api/recommend/v2')
def api_recommend() :
    return jsonify({})



if __name__ == '__main__':
    app.run()
