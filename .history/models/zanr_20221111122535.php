<?php

class Zanr {

    public $zanrID;
    public $zanr;


    public function __construct($zanrID=null,$zanr=null)
    {
        $this->zanrID = $zanrID;
        $this->zanr=$zanr;
    }

    public static function vratiZanrove(mysqli $konekcija)
    {
        $query = "SELECT * FROM zanr";
        $resultSet = $konekcija->query($query);
        $zanrovi = [];
        while($zanr = $resultSet->fetch_object()){
            $zanrovi[] = $zanr;
        }
        return $zanrovi;
    }

}

