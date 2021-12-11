let currentPlaylist = Array()
let audioElement;


function Audio() {
    //this.currentlyPlaying;
    this.audio = document.createElement('audio');

    // Set the source of the audio file to play
    this.setTrack = function (source) {
        this.audio.src = source;
    }
    this.play = function () {
        this.audio.play();
    }

    this.pause = function () {
        this.audio.pause();

    }
}