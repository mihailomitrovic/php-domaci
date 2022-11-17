<?php


class Film
{

   public $filmID;
   public $naziv;
   public $statusID;
   public $ocena;
   public $zanrID;


    public function __construct($filmID=null, $naziv=null, $statusID=null, $ocena=null, $zanrID=null)
    {
        $this->filmID = $filmID;
        $this->naziv=$naziv;
        $this->statusID=$statusID;
        $this->ocena=$ocena;
        $this->zanrID=$zanrID;
    }

    public static function vratiFilmove($status, $sortiranje, mysqli $konekcija)
    {
        $query = "SELECT * FROM film f join zanr z on f.zanrID = z.zanrID join status s on f.statusID = s.statusID";
        if($status != "0"){
            $query .= " WHERE f.statusID = " . $status;
        }
        $query.= " ORDER BY f.ocena " . $sortiranje;
        $resultSet = $konekcija->query($query);
        $filmovi = [];
        while($film = $resultSet->fetch_object()){
            $filmovi[] = $film;
        }
        return $filmovi;
    }

    public static function dodaj($naziv, $ocena=null, $status, $zanrID, mysqli $konekcija)
    {
        $query = "INSERT INTO film VALUES(null, '$naziv','$ocena','$status', $zanrID)";
        $odgovor =  $konekcija->query($query);
        return $odgovor;
    }

    public static function azuriraj($filmID, $ocena, mysqli $konekcija)
    {
        $query = "UPDATE film SET ocena = '$ocena', statusID='1' WHERE filmid = $filmID";
        $odgovor =  $konekcija->query($query);
        return $odgovor;
    }

    public static function obrisi($filmID, mysqli $konekcija)
    {
        $query = "DELETE FROM film WHERE filmid = $filmID";
        $odgovor =  $konekcija->query($query);
        return $odgovor;
    }
}