let currentPlaylist = Array()
let audioElement;


//Function to format the time.
function formatTime(seconds) {
    let time = Math.round(seconds);
    let minutes = Math.floor(time / 60);
    let second = time - minutes * 60;

    // Account for string one digit seconds by adding leading 0.
    if (second <= 9) {
        second = "0" + second.toString()
    } else {
        second = second.toString()
    }
    return minutes + ":" + second;

}

function Audio() {
    this.currentlyPlaying;
    this.audio = document.createElement('audio');

    // Update the time remaining in the playing bar.
    this.audio.addEventListener("canplay", function () {
        let duration = formatTime(this.duration)

        $(".progressTime.remaining").text(duration);


    })

    // Set the source of the audio file to play
    this.setTrack = function (track) {
        this.currentlyPlaying = track;
        this.audio.src = track.path;
    }
    this.play = function () {
        this.audio.play();
    }

    this.pause = function () {
        this.audio.pause();

    }
}