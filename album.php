<?php
include("includes/includedFiles.php");
//Retrieve variables from url (id)
if (isset($_GET['id'])) {
    $albumId = $_GET['id'];
} else {
    header("Location: index.php");
}
// Retrieve the appropriate entry in the album table.
$album = new Album($con, $_GET['id']);

// Retrieve the artist from the artist table using artist id from the album table.
// Create new artist object
$artist = $album->getArtist();


// Check to see if session variable set
if (isset($_SESSION['userLoggedIn'])) {
    $username = $_SESSION['userLoggedIn'];

    echo "<script>userLoggedIn = '$username';</script>";
    echo "<script>console.log(userLoggedIn);</script>";
} else {
    header("Location: register.php");
}
?>

<div class="entityInfo">
    <div class="leftSection">
        <img src="<?php
        echo $album->getArtwork(); ?>"/>
    </div>
    <div class="rightSection">
        <h2><?php
            echo $album->getTitle(); ?></h2>
        <p>By <?php
            echo $artist->getName(); ?></p>
        <p><?php
            echo $album->getNumberOfSongs(); ?> songs</p>
    </div>
</div>

<div class="trackListContainer">
    <ul class="trackList">
        <?php
        $songIdArray = $album->getSongIds();
        $i = 1;
        foreach ($songIdArray as $songId) {
            $albumSong = new Song($con, $songId);
            $albumArtist = $albumSong->getArtist();
            echo "<li class='trackListRow'>

                        <div class='trackCount'>
                            <img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $albumSong->getSongId() . "\",tempPlaylist, true)'/>
                            <span class='trackNumber'>$i</span>
                        </div>
                        <div class='trackInfo'>
                            <span class='trackName'>" . $albumSong->getTitle() . " </span >
                            <span class='artistName'>" . $albumArtist->getName() . " </span >
                        </div >
                        <div class='trackOptions'>
                        <input type='hidden' class='songId' value='" . $albumSong->getSongId() . "'>
                            <img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this);'/>
                        </div>
                        <div class='trackDuration'>
                            <span class='duration'>" . $albumSong->getDuration() . "</span>
                        
                        </div>
                    </li > ";
            $i++;
        }
        ?>
        <script>
            let tempSongIds = '<?php echo json_encode($songIdArray); ?>';
            tempPlaylist = JSON.parse(tempSongIds);
        </script>
    </ul>
</div>


<nav class="optionsMenu">
    <input type="hidden" class="songId">
    <?php
    echo Playlist::getPlaylistDropdown($con, $userLoggedIn->getUsername()) ?>
</nav>
