<?php

// Connexion à la base de données
session_start();
require_once("../connexion.php");

// Fonction pour créer un compte utilisateur
function creerCompte($nom, $prenom, $email, $mot_de_passe) {
    global $conn;
    $roles = "admin";
    // Hacher le mot de passe
    $hash= password_hash($mot_de_passe, PASSWORD_DEFAULT, [
        'cost' => 12, // Ajuster le coût selon vos besoins
    ]);

    // Préparer la requête SQL
    
    $sql = "INSERT INTO user (email, roles, password, firstname, lastname, datecreate) VALUES (?, ?, ?, ?, ?, ?)";

    // Lier les paramètres
    if (!$stmt = $conn->prepare($sql)) {
        die('Erreur de préparation de la requête : ' . $conn->error);
    }

    $stmt->bind_param('ssssss', $email , $roles ,  $hash, $nom, $prenom, date("d/m/y"));

    // Exécuter la requête
    if (!$stmt->execute()) {
        die('Erreur d\'exécution de la requête : ' . $stmt->error);
    }

    // Fermer la requête
    $stmt->close();
}

// Formulaire d'inscription
if (isset($_POST['submit'])) {

    $nom = $_POST['FirstName'];
    $prenom = $_POST['LastName'];
    $email = $_POST['InputEmail'];
    $mot_de_passe = $_POST['InputPassword'];
    $mot_de_passe_verifi = $_POST['RepeatPassword'];
    // Vérifier si tous les champs sont remplis
    if (!empty($nom) || !empty($prenom) || !empty($email) || !empty($mot_de_passe) || !empty($mot_de_passe_verifi)) {
        if ($mot_de_passe_verifi == $mot_de_passe){

            // Vérifier si l'adresse e-mail existe déjà
            $sql = "SELECT * FROM user WHERE email = ?";

            if (!$stmt = $conn->prepare($sql)) {
                die('Erreur de préparation de la requête : ' . $conn->error);
            }
            
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                echo 'Cette adresse e-mail est déjà utilisée.';
            } else {
                // Créer le compte utilisateur
                creerCompte($nom, $prenom, $email, $mot_de_passe);
                header("Location: ../../index.php");
                exit();
            }

            $stmt->close();

        }else{
            echo 'verifier mote de passe.';
        }

        
    }else {
        header("Location: ../../404.html");
        exit();
    }
}else{
    echo 'non';
}

?>
