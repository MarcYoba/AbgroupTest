<?php

require_once("../connexion.php"); 


class Caise{
    public $datecaise;

    public function __construct($datecaise)
    {
        $this->datecaise = $datecaise;
    }

    public function ToDay(){
        global $conn;
        $sql = "SELECT SUM(montant) as montant FROM `caisse` WHERE operation ='sortie en caisse' and dateoperation = CURRENT_DATE";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        return $row["montant"]; 
    }

    public function AllSortieCaise(){
        global $conn;
        $data=[];
        $sql = "SELECT * FROM `caisse` WHERE operation ='sortie en caisse' and dateoperation = CURRENT_DATE";
        $result = $conn->query($sql);

        while($row = mysqli_fetch_assoc($result)){
            array_push($data,$row);
        }
        return $data; 
    }
}
?>