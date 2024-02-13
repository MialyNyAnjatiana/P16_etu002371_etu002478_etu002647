<?php
session_start();
$username = $_SESSION['user']['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Cueillir.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>    
    <title>Tea production</title>
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
                <li><a aria-disabled="true"><h4>Ajout cueillette</h4></a></li>
                <li><a href="Depenses.php"><h4>Ajout de dépenses</h4></a></li>
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
            <input type="date" name="date" id="date" required>
        <h3 >Choisir le cueilleur
            <br>
        <select class="form-select form-select-lg mb-3" name="cueilleur" id="cueilleur">
        </select></h3>
    

        <h3>Choisir la parcelle
        <br>
        <select class="form-select form-select-lg mb-3" name="parcelle" id="parcelle">
        </select></h3>


        <h3>Choisir le poid à prendre</h3>
        <h4>
            <input type="number" name="poid" id="poid" min="1" max="100">/Kg
        </h4>
            <br><br>
        <div class="input-box button">
            <input type="button" value="Valider" class="btn" onclick="valider()">
            <button class="btn"><a href="Accueil.html">Retour</a></button>
          </div>
        </center>
        

        </div>
       </ul>
    </div>
</body>
<script>
    function updCueilleur() {
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
                    var select = document.getElementById("cueilleur");
                    select.innerHTML = "<option value=\"\">Cueilleur</option>";
                    
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

        xhr.open("GET", "traitement-php/liste/cueilleur-list.php", true);
        xhr.send(null);
    }

    function updParcelle() {
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
                    var select = document.getElementById("parcelle");
                    select.innerHTML = "<option value=\"\">Parcelle</option>";
                    
                    var retour = JSON.parse(xhr.responseText);

                    for (let i = 0; i < retour.length; i++) {
                        var option = document.createElement("option");
                        option.value = retour[i].num;
                        var text = document.createTextNode(retour[i].num + ". " + retour[i].variete);
                        option.appendChild(text);
                        select.appendChild(option);
                    }
                    
                } else {
                    document.sub = "Error code " + xhr.status;
                }
            }
        };

        xhr.open("GET", "traitement-php/liste/parcelle-list.php", true);
        xhr.send(null);
    }

    function valider() {
        var cueilleur = document.getElementById("cueilleur").value;
        var parcelle = document.getElementById("parcelle").value;
        var date = document.getElementById("date").value;
        var poid = document.getElementById("poid").value;

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

        xhr.open("GET", "traitement-php/insertion/ajout-cueillette.php?c=" + cueilleur + "&p=" + parcelle + "&date=" + date + "&poid=" + poid, true);
        xhr.send(null);
        reload();
    }

    window.onload = function() {
        updCueilleur();
        updParcelle();
    }

    function reload() {
        window.location.reload();
    }
</script>
</html>