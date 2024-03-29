<?php
session_start();
$username = $_SESSION['admin']['nom'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Configuration.css">
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
            <li><a href="AdminAccueil.php"><h4>Accueil</h4></a></li>
            <li><a aria-disabled="true"><h4>Configuration</h4></a></li>
            <li><a href="Cueilleur.php"><h4>Gestion cueilleur</h4></a></li> 
            <li><a href="traitement-php/disconnect.php"><h4>Se deconnecter</h4></a></li>
          </div>

      </div>
  </nav>
</center>
</head>
<body>
    <div class="container">
        <br>
        <label for="config">Configuration de la régénération:</label>
        <div class="d-inline-flex p-2">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Janvier
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Fevrier
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Mars
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Avril
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Mai
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Juin
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Juiellet
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Aout
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Septembre
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Octobre
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Novembre
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Decembre
            </label>
          </div>
        </div>
        <br><br>
        <label for="poids">Définir le poids minimal qu'un cueilleur peut prendre:</label>
        <input type="number" min="1" max="10">
        <label for="poids">et le poids maximal</label>
        <input type="number" min="1" max="10">
        <br><br>
        <label for="bonus">Bonus de</label><input type="number" min="1" max="100"><label for="bonus">%</label>
        <br>       
        <label for="bonus">Mallus de</label><input type="number" min="1" max="100"><label for="bonus">%</label>
        <br><br>
        <label for="vente">Rajouter le prix de vente par variété de thé:</label><br>
        <label for="thé">thé vert:</label><input type="number">Ariary
        <br>
        <label for="thé">thé noir:</label><input type="number">Ariary
        <br>
        <label for="thé">Chai tea:</label><input type="number">Ariary
        <br><br>
        <button type="button" class="btn btn-light">Sauvegarder</button>
          
    </div>

    <footer>RAJOELINA Arizo Ny Aina_etu2478-TOVOARIVELO Nalitiana_etu2647-ANDRIAMALALA Mialy Ny Anjatiana_etu2371</footer>
</body>
</html>