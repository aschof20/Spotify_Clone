<?php

class Album {
    private $con;
    private $id;
    private $title;
    private $artistId;
    private $genre;
    private $artworkPath;

    public function __construct($con, $id) {
        $this->con = $con;
        $this->id = $id;

        $query = mysqli_query($this->con, "SELECT * FROM albums WHERE id='$this->id'");
        $album = mysqli_fetch_array($query);

        $this->title = $album['title'];
        $this->artistId = $album['artist'];
        $this->genre = $album['genre'];
        $this->artworkPath = $album['artwork/Path'];
    }

    // GETTERS

    //Function that retrieves album title.
    public function getTitle() {
        return $this->title;
    }

    //Function that retrieves artists name.
    public function getArtist() {
        return new Artist($this->con, $this->artistId);
    }

    //Function that retrieves artworkPath.
    public function getArtwork() {
        return $this->artworkPath;
    }

    //Function that retrieves genre.
    public function getGenre() {
        return $this->genre;
    }
}