<?php

class Status {
    public $statusID;
    public $status;

    public function __construct($statusID=null,$status=null)
    {
        $this->statusID = $statusID;
        $this->status=$status;
    }

    public static function vratiStatuse(mysqli $konekcija)
    {
        $query = "SELECT * FROM status";
        $resultSet = $konekcija->query($query);
        $statusi = [];
        while($status = $resultSet->fetch_object()){
            $statusi[] = $status;
        }
        return $statusi;
    }
}

