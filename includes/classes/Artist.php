<?php

class Artist {
    private $con;
    private $id;

    public function __construct($con, $id) {
        $this->con = $con;
        $this->id = $id;
    }

    //Function that retrieves artists name.
    public function getName() {
        $artistQuery = mysqli_query($this->con, "SELECT name FROM artists WHERE id='$this->id'");
        $artist = mysqli_fetch_array($artistQuery);
        return $artist['name'];
    }

    public function getSongIds() {
        $query = mysqli_query($this->con, "SELECT id FROM Songs WHERE artist='$this->id' ORDER BY plays ASC");

        $array = array();
        // Convert result of query to an array.
        while ($row = mysqli_fetch_array($query)) {
            array_push($array, $row['id']);
        }

        return $array;
    }

    public function getId() {
        return $this->id;
    }

}