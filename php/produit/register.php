<?php

// Connexion à la base de données
require_once("../connexion.php");

// Fonction pour créer un compte utilisateur $nom, $type, $prixvente, $prixachat, $quantite
function creerClient($nom, $type, $prixvente, $prixachat,$quantite,$cathegorie) {
    global $conn;

    // Préparer la requête SQL
    // --------------------------------------------------------------------------------
    // Creation du client (insertion de donne) 

    $sql = "INSERT INTO produit (nom_produit, prix_produit_vente,quantite_produit, prix_achat_produit, stock_start_produit,type_produit,date_ajout_produit,cathegorie) VALUES (?, ?, ?, ?, ?, ?, ?,?)";

    // Lier les paramètres
    if (!$stmt = $conn->prepare($sql)) {
        die('Erreur de préparation de la requête : ' . $conn->error);
    }
    $date = date("y/m/d");
    $stmt->bind_param('sddddsss', $nom, $prixvente,$quantite,  $prixachat,$quantite,$type, $date,$cathegorie);

    // Exécuter la requête
    if (!$stmt->execute()) {
        die('Erreur d\'exécution de la requête : ' . $stmt->error);
    }

    // Fermer la requête
    $stmt->close();
    $conn->close();
}

// Formulaire d'enregistrement produit
if (isset($_POST['enregistrement'])) {

    $nom = $_POST['Nomproduit'];
    $type = $_POST['typeProduit'];
    $prixvente = $_POST['prixvente'];
    $prixachat = $_POST['prixachat'];
    $quantite = $_POST['InputQuantite'];
    $cathegorie = $_POST['cathegorie'];
    
    // Vérifier si tous les champs sont remplis
    if (!empty($nom) || !empty($type) || !empty($prixvente) || !empty($prixachat) || !empty($quantite) || !empty($cathegorie)) {
        
            // Vérifier si l'adresse e-mail existe déjà
            $sql = "SELECT * FROM produit WHERE nom_produit = ?";

            if (!$stmt = $conn->prepare($sql)) {
                die('Erreur de préparation de la requête : ' . $conn->error);
            }
            
            $stmt->bind_param('s', $nom);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                echo 'Cette produit est déjà utilisée.';
                //exit();
            } else {
                // Créer le compte utilisateur
                creerClient($nom, $type, $prixvente, $prixachat, $quantite,$cathegorie);
                header("Location:liste.php");
                exit();
            }

            $stmt->close(); 
    }else {
        header("Location: ../../404.html");
        exit();
    }
}

// Formulaire d'modification produit
if (isset($_POST['modifier'])) {

    $id = $_POST['reference'];
    $nom = $_POST['Nomproduit'];
    $type = $_POST['typeProduit'];
    $prixvente = $_POST['prixvente'];
    $prixachat = $_POST['prixachat'];
    $quantite = $_POST['InputQuantite'];
    $cathegorie = $_POST['cathegorie'];
    
    // Vérifier si tous les champs sont remplis
    if (!empty($nom) || !empty($type) || !empty($prixvente) || !empty($prixachat) || !empty($quantite) || !empty($cathegorie)) {
        
            // Vérifier si l'adresse e-mail existe déjà
            $sql = "SELECT * FROM produit WHERE id = ?";

            if (!$stmt = $conn->prepare($sql)) {
                die('Erreur de préparation de la requête : ' . $conn->error);
            }
            
            $stmt->bind_param('d', $id);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $sql = "UPDATE produit set nom_produit ='$nom',type_produit ='$type', prix_produit_vente ='$prixvente',
                	prix_achat_produit ='$prixachat', quantite_produit ='$quantite',cathegorie ='$cathegorie' WHERE id = '$id'";
                $result = $conn->query($sql);
                header("Location: liste.php");

            } else {
                echo 'Ce produit viens d de quel stock.';
            } 
    }else {
        header("Location: ../../404.html");
        exit();
    }
}else{
    echo 'non';
}

?>

