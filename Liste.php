<?php
session_start();
$username = $_SESSION['user']['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Accueil.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>    
    <title>Production de thé</title>
    <center>
    <nav class="navbar navbar-default">
        <div class="container-fluid">   
            
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            <ul class="nav navbar-nav navbar-right" id="nav">
              <li><h2><?php echo $username ?></h2></li>
              <li><a href="Accueil.php"><h4>Accueil</h4></a></li>
              <li><a href="Cueillir.php"><h4>Ajout cueillette</h4></a></li>
              <li><a href="Depenses.php"><h4>Ajout de dépenses</h4></a></li>
              <li><a href="Resultat.php"><h4>Voir les résultat</h4></a></li>
              <li><a aria-disabled=""><h4>Liste des paiements</h4></a></li>
              <li><a href="traitement-php/disconnect.php"><h4>Se deconnecter</h4></a></li>
            </div>

        </div>
    </nav>
  </center>
</head>
<body>
    <div class="container">
    <h2 >Liste des paiements</h2>
    
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Nom du cueilleur</th>
            <th scope="col">Date</th>
            <th scope="col">Poids</th>
            <th scope="col">%Bonus</th>
            <th scope="col">%Mallus</th>
            <th scope="col">Montant de paiement</th>
            
          </tr>
        </thead>
        <tbody>
          <tr>
        <th scope="row">Arizo</th>
            <td>21/05/2023</td>
            <td>8kg</td>
            <td>20</td>
            <td>0</td>
            <td>30.000Ar</td>
            
        
          </tr>
          <tr>
            <th scope="row">Nalitiana</th>
            <td>31/02/2024</td>
            <td>5kg</td>
            <td>10</td>
            <td>15</td>
            <td>20.000Ar</td>
        
          </tr>
          <tr>
            <th scope="row">Mialy</th>
            <td>21/12/2023</td>
            <td>9kg</td>
            <td>40</td>
            <td>0</td>
            <td>80.000Ar</td>
        
          </tr>
        </tbody>
      </table>

      
    </div>

    <footer>RAJOELINA Arizo Ny Aina_etu2478-TOVOARIVELO Nalitiana_etu2647-ANDRIAMALALA Mialy Ny Anjatiana_etu2371</footer>
</body>
</html>