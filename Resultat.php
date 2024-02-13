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
              <li><a aria-disabled="true"><h4>Voir les résultat</h4></a></li>
              <li><a href="Liste.php"><h4>Liste des paiements</h4></a></li>
              <li><a href="traitement-php/disconnect.php"><h4>Se deconnecter</h4></a></li>
            </div>
        </div>
    </nav>
  </center>
</head>
<body>
    <div class="container">
    <h2>Résultat des cueilllettes</h2>
    
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Thé</th>
            <th scope="col">Poids totalde cueillette</th>
            <th scope="col">Poids restant sur les parcelles</th>
            <th scope="col">Coût de revient</th>
            
          </tr>
        </thead>
        <tbody>
          <tr>
            <td scope="row">thé vert</td>
            <td>5kg</td>
            <td>3kg</td>
            <td>20.000Ar</td>
        
          </tr>
          <tr>
            <td scope="row">thé noir</td>
            <td>3kg</td>
            <td>2kg</td>
            <td>15.000Ar</td>
        
          </tr>
          <tr>
            <td scope="row">thé aromatisé</td>
            <td>4kg</td>
            <td>5kg</td>
            <td>25.000Ar</td>

          </tr>
        </tbody>
      </table>
      <table class="table">
        <thead>
            <tr>
              <th scope="col">Montant des ventes</th>
              <th scope="col">Montant des dépenses</th>
              <th scope="col">Bénéfices</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td >100.000Ar</td>
              <td>70.000Ar</td>
              <td>30.000Ar</td>
              
          
            </tr>
            <tr>
              <td >70.000</td>
              <td>50.000Ar</td>
              <td>20.000Ar</td>
              
          
            </tr>
            <tr>
              <td >80.000Ar</td>
              <td>75.000Ar</td>
              <td>5.000Ar</td>
              
  
            </tr>
          </tbody>
      </table>


     
    </div>

    <footer>RAJOELINA Arizo Ny Aina_etu2478-TOVOARIVELO Nalitiana_etu2647-ANDRIAMALALA Mialy Ny Anjatiana_etu2371</footer>
</body>
</html>