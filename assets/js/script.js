function Audio() {
    //this.currentlyPlaying;
    this.audio = document.createElement('audio');

    // Set the source of the audio file to play
    this.setTrack = function (source) {
        this.audio.src = source;
    }
}