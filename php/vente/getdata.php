<?php
require_once("../connexion.php");
header('Content-Type: application/json');
global $conn;

$json = file_get_contents('php://input');
$donnees = json_decode($json,true);
$data = 0;
$quantite = 0;
$tab = array("provende" => "provenderie");


    if((str_contains($donnees["nom"],$tab["provende"])) == true) {    
        
        $sql = "SELECT CONCAT(nom_produit,' ',cathegorie) as nom, prix_produit_vente as prix, quantite_produit as quantite FROM produit WHERE cathegorie = 'provenderie'";
        $result = $conn->query($sql);

        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["nom"] == $donnees["nom"] ) {
                    $data = $row["prix"];
                    $quantite = $row["quantite"];
                    break;
                 
            } else {
                
            }     
        }
        
    }   
        
$reponse = [
    'success' => true,
    'message' => $data,
    'quantite' => $quantite
 ];
echo json_encode($reponse);

?>