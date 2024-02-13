<?php
session_start();
$username = $_SESSION['user']['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Depenses.css">
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
              <li><a aria-disabled="true"><h4>Ajout de dépenses</h4></a></li>
              <li><a href="Resultat.php"><h4>Voir les résultat</h4></a></li>
              <li><a href="Liste.php"><h4>Liste des paiements</h4></a></li>
              <li><a href="traitement-php/disconnect.php"><h4>Se deconnecter</h4></a></li>
            </div>
            
        </div>
    </nav>
</center>

</head>
<body>
    <center>
    <div class="container">    
        <h3>Date d'aujourd'hui</h3>
        <input type="date" id="date">

        <h3>Catégorie de dépense</h3>
        <select name="ctg" id="ctg"></select>

        <h3>Montant</h3>
          <input type="number" name="montant" placeholder="XXXX Ar" id="montant" min="1000">
        <br><br>  
            <button type="button" class="btn" onclick="valider()">Valider</button>
            <a href="Accueil.php">Retour</a>
          
    </div>
        </center>


       </ul>
    </div>

    <footer>RAJOELINA Arizo Ny Aina_etu2478-TOVOARIVELO Nalitiana_etu2647-ANDRIAMALALA Mialy Ny Anjatiana_etu2371</footer>
</body>
<script>
  function getCtg() {
    var xhr;

    try { xhr = new ActiveXObject('Msxml2.XMLHTTP'); }
    catch (e) {
        try {   xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
        catch (e2)  {
            try {  xhr = new XMLHttpRequest();  }
            catch (e3) {  xhr = false;  }
        }
    }

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
              var select = document.getElementById("ctg");
              select.innerHTML = "<option value=\"\">Catégorie de dépense</option>";
              
              var retour = JSON.parse(xhr.responseText);

              for (let i = 0; i < retour.length; i++) {
                  var option = document.createElement("option");
                  option.value = retour[i].id;
                  var text = document.createTextNode(retour[i].nom);
                  option.appendChild(text);
                  select.appendChild(option);
              }  
            } else {
              document.sub = "Error code " + xhr.status;
            }
        }
    };

    xhr.open("GET", "traitement-php/liste/ctg-depense-list.php", true);
    xhr.send(null);
  }

  function valider() {
    var ctg = document.getElementById("ctg").value;
    var date = document.getElementById("date").value;
    var montant = document.getElementById("montant").value;

    var xhr;

    try { xhr = new ActiveXObject('Msxml2.XMLHTTP'); }
    catch (e) {
        try {   xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
        catch (e2)  {
            try {  xhr = new XMLHttpRequest();  }
            catch (e3) {  xhr = false;  }
        }
    }

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                alert(xhr.responseText);
            } else {
                document.sub = "Error code " + xhr.status;
            }
        }
    };

    xhr.open("GET", "traitement-php/insertion/ajout-depense.php?c=" + ctg + "&date=" + date + "&montant=" + montant, true);
    xhr.send(null);
  }

  window.onload = function() {
    getCtg();
  }

  function reload() {
    window.location.reload();
  }
</script>
</html>