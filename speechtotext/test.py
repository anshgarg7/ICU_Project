import speech_recognition as sr
from utils import recognize_speech_from_mic
from flask import Flask
from flask import render_template
app = Flask(__name__)


@app.route('/', methods=['POST', 'GET'])
def stt():
	return render_template('test.html', msg="Press the button")


@app.route('/voice', methods=['GET', 'POST'])
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

	recordtuple = return_tuple
	print(recordtuple)

	return render_template('test.html', msg=recordtuple)


if __name__ == "__main__":
    app.run(host="localhost", port=5000, debug=True )