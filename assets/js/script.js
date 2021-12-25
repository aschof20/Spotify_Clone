let currentPlaylist = [];
let shufflePlaylist = [];
let tempPlaylist = [];
let audioElement;
let mousePressed = false;
let currentIndex = 0;
let repeat = false;
let shuffle = false;
let userLoggedIn;
let timer;


$(document).click(function (click) {
    let target = $(click.target);
    if (!target.hasClass("item") && !target.hasClass("optionsButton")) {
        hideOptionsMenu();
    }
})

//Hide the options menu on scroll
$(window).scroll(function () {
    hideOptionsMenu();
})


//Execute when playlist selected.
$(document).on("change", "select.playlist", function () {
    let select = $(this);
    let playlistId = select.val();
    let songId = select.prev(".songId").val();

    console.log("SOng Id: " + songId);
    console.log("Playlist Id: " + playlistId);
    //ajax call for adding song to playlist
    $.post("includes/handlers/ajax/addToPlaylist.php", {playlistid: playlistId, songid: songId})
        .done(function (error) {
            //error handling
            if (error != "") {
                alert(error);
                return;
            }

            hideOptionsMenu();
            select.val("");
        });
});

// Function to replace middle content to enable continuous playing of songs.
function openPage(url) {

    if (timer != null) {
        clearTimeout(timer);
    }
    if (url.indexOf("?") == -1) {
        url = url + "?";
    }
    let encodedURL = encodeURI(url + "&userLoggedIn=" + userLoggedIn);
    $("#mainContent").load(encodedURL);
    $("body").scrollTop(0);
    // Dynamically change url displayed in browser.
    history.pushState(null, null, url);
}

//Function to remove song from playlist
function removeFromPlaylist(button, playlistId) {
    let songId = $(button).prevAll('.songId').val();
    $.post("includes/handlers/ajax/removeFromPlaylist.php", {playlistId: playlistId, songId: songId})
        .done(function (error) {

            if (error != "") {
                alert(error);
                return;
            }
            openPage("playlist.php?id=" + playlistId);
        })

}

//Function that creates a user playlist
function createPlaylist() {
    let alerts = prompt("Please enter the name of you playlist")
    if (alerts != null) {
        $.post("includes/handlers/ajax/createPlaylist.php", {name: alerts, username: userLoggedIn})
            .done(function (error) {

                if (error != "") {
                    alert(error);
                    return;
                }
                openPage("yourMusic.php");
            })
    }
}

// Function to delete the playlist
function deletePlaylist(playlistId) {
    let prompt = confirm("Are you sure you want to delete this playlist? ");
    if (prompt) {
        $.post("includes/handlers/ajax/deletePlaylist.php", {playlistId: playlistId})
            .done(function (error) {

                if (error != "") {
                    alert(error);
                    return;
                }
                openPage("yourMusic.php");
            })
    }
}

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

// Function to update the volume progress bar.
function updateVolumeProgressBar(audio) {
    let volume = audio.volume * 100;
    $(".volumeBar .progress").css("width", volume + "%")
}

//Function to play song with clicking button on artist page.
function playFirstSong() {
    setTrack(tempPlaylist[0], tempPlaylist, true)
}

// Function to hide the options menu
function hideOptionsMenu() {
    let menu = $(".optionsMenu");
    if (menu.css("display") != "none") {
        menu.css('display', "none");
    }
}

//Function to display options menu alongside the button pressed
function showOptionsMenu(button) {
    let songId = $(button).prevAll('.songId').val();
    let menu = $('.optionsMenu');
    let menuWidth = menu.width();
    menu.find(".songId").val(songId);

    let scrollTop = $(window).scrollTop();
    let elementOffset = $(button).offset().top;

    let top = elementOffset - scrollTop;
    let left = $(button).position().left;
    menu.css({"top": top + "px", "left": left - menuWidth + "px", "display": "inline"});
}

//Function to logout
function logout() {
    $.post("includes/handlers/ajax/logout.php", function () {
        location.reload();
    })
}

//Function to update email
function updateEmail(emailClass) {
    let emailVal = $("." + emailClass).val();

    $.post("includes/handlers/ajax/updateEmail.php", {
        email: emailVal,
        username: userLoggedIn
    }).done(function (response) {
        $("." + emailClass).nextAll(".message").text(response);
    });
}

//Function to update password
function updatePassword(oldPasswordClass, newPasswordClass1, newPasswordClass2) {
    let oldPassword = $("." + oldPasswordClass).val();
    let newPassword1 = $("." + newPasswordClass1).val();
    let newPassword2 = $("." + newPasswordClass2).val();


    $.post("includes/handlers/ajax/updatePassword.php", {
        oldPassword: oldPassword,
        newPassword1: newPassword1,
        newPassword2: newPassword2,
        username: userLoggedIn
    }).done(function (response) {
        $("." + oldPasswordClass).nextAll(".message").text(response);
    });
}


function Audio() {
    this.currentlyPlaying;
    this.audio = document.createElement('audio');

    // Event listener to play next song after completed song.
    this.audio.addEventListener("ended", function () {
        nextSong();
    })

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

    // Event listener to update volume bar
    this.audio.addEventListener("volumechange", function () {
        updateVolumeProgressBar(this);
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

    this.setTime = function (seconds) {
        this.audio.currentTime = seconds;
    }
}