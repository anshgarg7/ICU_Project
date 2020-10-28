import speech_recognition as sr
from utils import recognize_speech_from_mic
import mysql.connector
from mysql.connector import Error
from mysql.connector import errorcode
from flask import Flask
from flask import render_template
from flaskext.mysql import MySQL
from flask_mysqldb import MySQL
import os
from flask import  request
from flask import redirect, url_for
import MySQLdb
app = Flask(__name__)
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = '123'
app.config['MYSQL_DB'] = 'icu'
mysql = MySQL(app)
app.config.from_object('config')
@app.route('/',methods=['POST','GET'])
def stt():
	return render_template('test.html')
@app.route('/voice', methods=['GET','POST'])
def voice():
	r = sr.Recognizer()
	m = sr.Microphone()
	print("-----------------START SPEAKING------------------")
	response = recognize_speech_from_mic(r, m)  # speak after running this line
	print(response)
	test = []
	test.append(response["transcription"])
	test.append(response["success"])
	test.append(response["error"])
	return_tuple = (test[0], test[1], test[2])

	recordTuple = return_tuple
	print(recordTuple)

	return render_template('test.php')
if __name__ == "__main__":
    app.run(host="localhost", port=5000,debug=True)