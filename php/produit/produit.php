<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GESTION DE STOCK</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="../../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container" >
        
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center" >
                                <h1 class="h4 text-gray-900 mb-4">Enregistrer un Produit</h1>
                            </div>
                            <form class="user" action="register.php" method="post" >
                                <?php 
                                    
                                    if(isset($_GET['tableau'])){
                                        $tabdonne = $_GET['tableau'];
                                       $donnees= json_decode($tabdonne,true);
                                       echo '<div class="form-group ">';
                                            echo'<div class="col-sm-14 mb-3 mb-sm-0">';
                                                echo'Numero Reference du produit :'.'<input type="text" class="form-control form-control-user" id="reference"
                                                name="reference"  value="'.$donnees["id"].'" required readonly>';  
                                                
                                            echo'</div>';
                                            echo'<hr>';
                                        echo'</div>';
                                    }else{
                                    }
                                    
                                    // var_dump($donnees);
                                    echo '<div class="form-group row">';
                                        echo'<div class="col-sm-6 mb-3 mb-sm-0">';
                                        if(isset($_GET['tableau'])){
                                            $tabdonne = $_GET['tableau'];
                                           $donnees= json_decode($tabdonne,true);
                                            
                                            echo'<input type="text" class="form-control form-control-user" id="Nomproduit"
                                            name="Nomproduit" placeholder="Nom produit" value="'.$donnees["nom_produit"].'" required>';  
                                        }else{
                                            echo'<input type="text" class="form-control form-control-user" id="Nomproduit"
                                            name="Nomproduit" placeholder="Nom produit"  required>';
                                        }
                                        echo'</div>'; 
                                        echo'<div class="col-sm-6 mb-3 mb-sm-0">';
                                            echo'<select id="typeProduit"  name="typeProduit"  class="form-control " required>';
                                                if(isset($_GET['tableau'])){
                                                    $tabdonne = $_GET['tableau'];
                                                $donnees = json_decode($tabdonne,true);
                                                    echo'<option value="'.$donnees["type_produit"].'"  selected>'.$donnees["type_produit"].'</option>';
                                                }else{
                                                    echo'<option value="type de produit" > type de produit</option>';
                                                }
                                                echo'<option value="ENERGIE" > ENERGIE</option>';
                                                echo'<option value="PROTEINE" > PROTEINE</option>';
                                                echo'<option value="CONCENTRER" > CONCENTRER</option>';
                                                echo'<option value="MINERAU" > MINERAU</option>';
                                                echo'<option value="ANTITOXINE" > ANTITOXINE</option>';
                                                echo'<option value="Autre Produit" > Autre Produit</option>';
                                            echo'</select>';
                                        echo'</div>';
                                    echo'</div>';
                                    echo'<div class="form-group row">';
                                        echo'<div class="col-sm-6 mb-3 mb-sm-0">';
                                        if(isset($_GET['tableau'])){
                                            $tabdonne = $_GET['tableau'];
                                            $donnees = json_decode($tabdonne,true);
                                            echo'<input type="number" class="form-control form-control-user"
                                            name="prixvente" id="prixvente" value='.intval($donnees["prix_produit_vente"]).' placeholder="Prix de vente" required>';
                                        }else{
                                            echo'<input type="number" class="form-control form-control-user"
                                            name="prixvente" id="prixvente" placeholder="Prix de vente" required>';
                                        }
                                        echo'</div>';
                                        echo'<div class="col-sm-6 mb-3 mb-sm-0">';
                                        if(isset($_GET['tableau'])){
                                            $tabdonne = $_GET['tableau'];
                                            $donnees = json_decode($tabdonne,true);
                                            echo'<input type="text" class="form-control form-control-user"
                                            name="prixachat" id="prixachat" value='.intval($donnees["prix_achat_produit"]).' placeholder="Prix achat" required>';
                                            
                                        }else{
                                            echo'<input type="number" class="form-control form-control-user"
                                            name="prixachat" id="prixachat" placeholder="Prix achat" required>';
                                        }   
                                        echo'</div>';
                                    echo'</div>';
                                
                                    echo'<hr>';
                                    echo'<div class="form-group row">';
                                        echo'<div class="col-sm-6 mb-3 mb-sm-0">';
                                            if(isset($_GET['tableau'])){
                                                $tabdonne = $_GET['tableau'];
                                                $donnees = json_decode($tabdonne,true);
                                                echo'<input type="number" class="form-control form-control-user" id="InputQuantite"
                                                name="InputQuantite" placeholder="Quantite de demmarage"  value='.intval($donnees["quantite_produit"]).' required>';
                                            }else{
                                                echo'<input type="number" class="form-control form-control-user" id="InputQuantite"
                                                name="InputQuantite" placeholder="Quantite de demmarage" required>';
                                            } 
                                            
                                        echo'</div>';
                                        echo'<div class="col-sm-6 mb-3 mb-sm-0">';
                                        echo' <select id="cathegorie"  name="cathegorie"  class="form-control " required>';
                                                if(isset($_GET['tableau'])){
                                                    $tabdonne = $_GET['tableau'];
                                                $donnees = json_decode($tabdonne,true);
                                                    echo'<option value="'.$donnees["cathegorie"].'"  selected>'.$donnees["cathegorie"].'</option>';
                                                    echo '<div date_add='.$donnees["id"].' id="id"></div>';
                                                }else{
                                                    echo'<option selected> reference provenderie ou pharmacie</option>';;
                                                }
                                                
                                                echo'<option value="provenderie" >provenderie</option>';
                                                echo'<option value="pharmacie" > pharmacie</option>';
                                            echo'</select>';
                                        echo'</div>';
                                    echo'</div>';
                                    if(isset($_GET['tableau'])){
                                        echo'<button type="submit" name="modifier" id="modifier" class="btn btn-primary btn-user btn-block">
                                        Modifier
                                    </button>';
                                    }else{
                                        echo'<button type="submit" name="enregistrement" id="enregistrement" class="btn btn-primary btn-user btn-block">
                                        Enregistrement
                                    </button>';
                                    }
                                  
                                ?>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="../../index.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>
    <!--<script src="produit.js"></script> --> 

</body>

</html>