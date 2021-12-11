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

// Function to update the track progress time.
function updateTimeProgressBar(audio) {
    // Update current and remaining times.
    $(".progressTime.current").text(formatTime(audio.currentTime));
    $(".progressTime.remaining").text(formatTime(audio.duration - audio.currentTime));

    // Update the progress bar.
    // Get percentage of the current time.
    let progress = audio.currentTime / audio.duration * 100;
    $(".playbackBar .progress").css("width", progress + "%")
}

function Audio() {
    this.currentlyPlaying;
    this.audio = document.createElement('audio');

    // Event listener to time of track to play bar.
    this.audio.addEventListener("canplay", function () {
        let duration = formatTime(this.duration)
        $(".progressTime.remaining").text(duration);
    })

    // Event listener to update the time in play bar.
    this.audio.addEventListener("timeupdate", function () {
        if (this.duration) {
            updateTimeProgressBar(this)
        }
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