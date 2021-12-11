<?php
// Create a playlist
// Randomly select 10 songs
$songQuery = mysqli_query($con, "SELECT id FROM songs ORDER BY RAND() LIMIT 10");

// Empty array of songs
$resultArray = array();

// Push the query results to the array
while ($row = mysqli_fetch_array($songQuery)) {
    array_push($resultArray, $row['id']);
}

// Convert php array to JSON array to enable js to use generated array.
$jsonArray = json_encode($resultArray);

?>

<script>

    $(document).ready(function () {
        currentPlaylist = <?php echo $jsonArray; ?>;
        audioElement = new Audio()
        setTrack(currentPlaylist[0], currentPlaylist, false);
    });

    // Function to set the track to be played.
    function setTrack(trackId, newPlayList, play) {
        audioElement.setTrack("assets/music/bensound-acousticbreeze.mp3")
        if (play) {
            audioElement.play()
        }

    }

    // Function to execute playing of track.
    function playSong() {
        // Hide play button and show pause button.
        $(".play").hide();
        $(".pause").show();
        audioElement.play();

    }

    // Function to execute pausing of a track.
    function pauseSong() {
        // Hide pause button and show play button.
        $(".play").show();
        $(".pause").hide();
        audioElement.pause();
    }
</script>


<div id="nowPlayingBarContainer">
    <div id="nowPlayingBar">
        <div id="nowPlayingLeft">
            <div class="content">
                <span class="albumLink">
                    <img class="albumArtwork"
                         src="https://pbs.twimg.com/profile_images/905183271046193153/q_P1KBUJ_400x400.jpg"/>
                </span>

                <div class="trackInfo">
                    <span class="trackName">
                        <span>Happy Birth</span>
                    </span>
                    <span class="artistName">
                        <span>Artist</span>
                    </span>
                </div>
            </div>
        </div>
        <div id="nowPlayingMiddle">
            <div class="content playerControls">
                <div class="buttons">
                    <button class="controlButton shuffle" title="Shuffle Button">
                        <img src="assets/images/icons/shuffle.png" alt="Shuffle">
                    </button>
                    <button class="controlButton previous" title="Previous Button">
                        <img src="assets/images/icons/previous.png" alt="Previous">
                    </button>
                    <button class="controlButton play" title="Play Button"
                            onclick="playSong()">
                        <img src="assets/images/icons/play.png" alt="Play">
                    </button>
                    <button class="controlButton pause" title="Pause Button"
                            onclick="pauseSong()">
                        <img src="assets/images/icons/pause.png" alt="Pause">
                    </button>
                    <button class="controlButton next" title="Next Button">
                        <img src="assets/images/icons/next.png" alt="Next">
                    </button>
                    <button class="controlButton repeat" title="Repeat Button">
                        <img src="assets/images/icons/repeat.png" alt="Repeat">
                    </button>
                </div>

                <div class="playbackBar">
                    <span class="progressTime current">0.00</span>

                    <div class="progressBar">
                        <div class="progressBarBg">
                            <div class="progress"></div>
                        </div>
                    </div>
                    <span class="progressTime remaining">0.00</span>

                </div>
            </div>
        </div>
        <div id="nowPlayingRight">
            <div class="volumeBar">
                <button class="controlButton volume" title="Volume Button">
                    <img src="assets/images/icons/volume.png" alt="Volume">
                </button>
                <div class="progressBar">
                    <div class="progressBarBg">
                        <div class="progress"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>