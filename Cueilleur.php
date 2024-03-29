<?php
session_start();
$username = $_SESSION['admin']['nom'];
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
    <style>
        /* Style pour le formulaire */
        #addForm {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        #addForm1 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
        
    </style>
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
            <li><a href="Configuration.php"><h4>Configuration</h4></a></li>
            <li><a aria-disabled="true"><h4>Gestion cueilleur</h4></a></li> 
            <li><a href="traitement-php/disconnect.php"><h4>Se deconnecter</h4></a></li>
          </div>
      </div>
  </nav>
</center>
</head>
<body>
    <div class="container">
        <center>
    <h2>Cueilleurs</h2>

    
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Nom</th>
            <th scope="col">Date de naissance</th>
            <th scope="col">Genre</th>
            <th scope="col">Salaire (par kg)</th>
            
          </tr>
        </thead>
        <tbody id="tbody"></tbody>
        
    </table>
    <button type="button" class="btn btn-success" onclick="addForm()">Ajouter des cueilleurs</button>
    </center>
      <br><br>

      
    </div>
    <div id="addForm" style="display: none;">
        <h2>Ajouter un cueilleur</h2>
        <form id="addFormInner">
            <div class="form-group" id="var_tea">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" placeholder="Nom">
            </div>
            <div class="form-group">
                <label for="dtn">Date de naissance</label>
                <input type="date" class="form-control" id="dtn">
            </div>
            <div class="form-group">
                <p>
                    <input type="radio" name="genre" id="genre" class="form-radio" value="1"> Homme
                    <input type="radio" name="genre" id="genre" class="form-radio" value="2"> Femme
                </p>
            </div>
            <div class="form-group">
                <label for="salaire">Salaire (par kg)</label>
                <input type="number" name="sal" id="sal" min="10000">
            </div>
            <button type="button" class="btn btn-primary" onclick="addCueilleur()">Ok</button>
            <button type="button" class="btn btn-primary" onclick="cancelAdd()">Annuler</button>
        </form>
    </div>

    <div id="addForm1" style="display: none;">
        <h2>Modifier le salaire d'un cueilleur</h2>
        <form id="addFormInner1">
            <input type="hidden" name="id" id="c_id">
            <div class="form-group">
                <label for="salaire">Nouveau Salaire (par kg)</label>
                <input type="number" name="sal" id="new" min="10000">
            </div>
            <button type="button" class="btn btn-primary" onclick="modifier()"></button>
            <button type="button" class="btn btn-primary" onclick="cancelAdd()">Annuler</button>
        </form>
    </div>

    <footer>RAJOELINA Arizo Ny Aina_etu2478-TOVOARIVELO Nalitiana_etu2647-ANDRIAMALALA Mialy Ny Anjatiana_etu2371</footer>
</body>
<script>
    function addForm() {
        document.getElementById('addForm').style.display = 'block';
    }
    function addForm1(id) {
        var doc = document.getElementById("c_id");
        var text = createTextNode(id);
        button.appendChild(text);
        doc.appendChild(button);
        document.getElementById('addForm1').style.display = 'block';
    }
    function addCueilleur() {
        var nom = document.getElementById("nom").value;
        var dtn = document.getElementById("dtn").value;
        var radios = document.getElementById("genre");
        var genre = document.querySelector('input[name="genre"]:checked').value;
        var sal = document.getElementById("sal").value;

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

            xhr.open("GET", "traitement-php/insertion/ajout-cueilleur.php?nom=" + nom + "&dtn=" + dtn + "&genre=" + genre + "&sal=" + sal, true);
            xhr.send(null);

            document.getElementById('addForm').style.display = 'none';
            update();
    }
    function cancelAdd() {
        document.getElementById('addForm').style.display = 'none';
    }
    function getListeCueilleur() {
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
                    var retour = JSON.parse(xhr.responseText);
                    var table = document.getElementById("tbody");
                    table.innerHTML = " ";

                    for (let i = 0; i < retour.length; i++) {
                        var row = document.createElement("tr");
                
                        var th = document.createElement("th");
                        th.scope = row;
                        var thText = document.createTextNode(retour[i].nom);
                        th.appendChild(thText);
                        row.appendChild(th);

                        var dtn = document.createElement("td");
                        var dtnText = document.createTextNode(retour[i].dtn);
                        dtn.appendChild(dtnText);
                        row.appendChild(dtn);

                        var genre = document.createElement("td");
                        var genreText = document.createTextNode(retour[i].genre);
                        genre.appendChild(genreText);
                        row.appendChild(genre);

                        var salaire = document.createElement("td");
                        var salaireText = document.createTextNode(retour[i].salaire);
                        salaire.appendChild(salaireText);
                        row.appendChild(salaire);

                        var inp = document.createElement("td");
                        var input = document.createElement("input");
                        input.className = "btn btn-danger";
                        input.type = "button";
                        input.value = "Supprimer";
                        input.onclick = function() {
                            supprimer(retour[i].id);
                        }

                        var inp2 = document.createElement("td");
                        var input2 = document.createElement("input");
                        input2.className = "btn btn-info";
                        input2.type = "button";
                        input2.value = "Modifier";
                        input2.onclick = function() {
                            addForm1(retour[i].id);
                        }

                        inp2.appendChild(input2);
                        row.appendChild(inp2);

                        inp.appendChild(input);
                        row.appendChild(inp);

                        table.appendChild(row);
                        
                    }
                }
            }
        }

        xhr.open("GET", "traitement-php/liste/cueilleur-list.php", true);
        xhr.send(null);
        update();
    }

    function supprimer(id) {
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

        xhr.open("GET", "traitement-php/suppression/supprimer-cueilleur.php?id=" + id, true);
        xhr.send(null);
        update();
    }

    function modifier() {
        var xhr;

        var newVal = document.getElementById("new").value;
        var newId = document.getElementById("c_id").value;

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

        xhr.open("GET", "traitement-php/update/update-cueilleur.php?id=" + newId + "&new=" + newVal, true);
        xhr.send(null);
        update();
    }

    window.onload = function() {
        getListeCueilleur();
    }

    function update() {
        getListeCueilleur();
    }
</script>
</html>