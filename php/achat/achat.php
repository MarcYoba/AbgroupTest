<?php require_once("../connexion.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="../../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Achat</h1>
                            </div>
                           <!-- <form class="user"  >-->
                                
                                    <!-- DataTales Example -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Tables des Achats</h6>
                                            <br>
                                            <div class="row">
                                                <p class="btn btn-warning btn-user col-md-4" onclick="ajouterLigne('dataTable', 
                                                5, 10)">ajouter ligne d'achat</p>
                                                <p class="col-md-2" >quantite : <span id="quantitetotal">0</span></p>
                                                <p class="col-md-2" >prix : <span id="prixtotal">0</span></p>
                                                <p class="col-md-3" ><input type="date" class="form-control form-control-user" id="datefacture"
                                                name="datefacture" placeholder="date achat"></p>
                                            </div>
                                            <span id="verificatiobDonne"></span>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable"  width="100%" cellspacing="0">
                                                    <thead>
                                                    
                                                        <tr>
                                                            <th>Fourniseur</th>
                                                            <th>description</th>
                                                            <th>quantite</th>
                                                            <th>prix_unite</th>
                                                            <th>Mantant</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                       
                                                        
                                                    </tfoot>
                                                    <tbody>
                                                        <tr class="br-primary">
                                                            <th class = >
                                                            <div class="form-group ">
                                                                <select id="fournisseur"  name="fournisseur"  class="form-control form-select" required>
                                                                    <option selected> </option>
                                                                    <?php 
                                                                        global $conn;
                                                                        $sql = "SELECT id, nom FROM fournisseur";
                                                                        $result = $conn->query($sql);
                                                                        while ($row = mysqli_fetch_assoc($result)){
                                                                            echo "<option value='".$row["id"]."'>".$row["nom"]."</option>";
                                                                            //var_dump($row);
                                                                        }
                                                                    ?> 
                                                                </select>
                                                            </div>
                                                            </th>
                                                            <th>
                                                                <div class="form-group row">
                                                                
                                                                <!-- <input type="text" class="form-control form-control-user" id="Nomproduit"
                                                                    name="Nomproduit" placeholder="Nom produit" required> -->
                                                                    <select id="nomProduit"  name="nomProduit"  class="form-control form-select" required>
                                                                    <option selected></option>
                                                                    <?php 
                                                                        global $conn;
                                                                        $sql = "SELECT  nom_produit FROM produit";
                                                                        $result = $conn->query($sql);
                                                                        while ($row = mysqli_fetch_assoc($result)){
                                                                            
                                                                            echo "<option value='".$row["nom_produit"]."'>".$row["nom_produit"]."</option>";
                                                                            
                                                                            //var_dump($row);
                                                                        }
                                                                    ?>
                                                                    </select>
                                                                
                                                            </div>
                                                        </th>
                                                            <th> 
                                                                <input type="number" class="form-control form-control-user"
                                                                    name="quantite" id="quantite" placeholder="quantite" required>
                                                            </th>
                                                            <th>
                                                                <input type="number" class="form-control form-control-user"
                                                                name="prixglobal" id="prixglobal" placeholder="Prix du produit">   
                                                            </th>
                                                            <th>
                                                            <p class="form-control form-control-user" id="montanttotal">
                                                               <span id="resultat"></span> cfa
                                                            </p>   
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <hr>
                                                <button  class="btn btn-primary btn-user btn-block" onclick="enregistrementDonnees('dataTable')">
                                                    Enregistrer
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    
                                </div>
                            <!--</form> -->
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
    <script src="nouvelleligneachat.js"></script>
    <script>
        function calculerTotal(ligneIndex){
            const quantite = document.getElementById(`cellule_dataTable_${ligneIndex * 3}`).textContent;
            const prix = document.getElementById(`cellule_dataTable_${ligneIndex * 3 + 1}`).textContent;
            const Totalcellule = document.getElementById(`cellule_dataTable_${ligneIndex * 3 + 2}`);

            const total = quantite * prix;

            Totalcellule.textContent = total;
        }
    </script>

</body>

</html>