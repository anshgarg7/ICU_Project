const recordButton = document.querySelector("#record");
const stopButton = document.querySelector("#stop");
recordButton.addEventListener("click", () => {
	record()
}) 
stopButton.addEventListener("click", () => {
	stop()
}) 

let mic, recorder, soundFile;
let status = 0;

function setup(){
	//init
	mic = new p5.AudioIn();
	mic.start();
	recorder = new p5.SoundRecorder();
	soundFile = new p5.SoundFile();

	//setup
	recorder.setInput(mic);
}

function record(){
	getAudioContext().resume()
	recorder.record(soundFile);
	stopButton.classList.remove("d-none");
	recordButton.classList.add("d-none");
}

function stop() {
	mic.stop();
	recorder.stop();
	soundFile.play();

	stopButton.classList.add("d-none");
	recordButton.classList.remove("d-none");
}