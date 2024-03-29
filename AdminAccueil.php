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
    <title>Tea production</title>
    <style>
        /* Style pour le formulaire */
        #addParcelleForm {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #ffffff; /* Couleur de fond */
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000; /* Pour être sûr que le formulaire est au-dessus de tout */
        }

        #addForm1 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #ffffff; /* Couleur de fond */
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000; /* Pour être sûr que le formulaire est au-dessus de tout */
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
                        <li><a aria-disabled="true"><h4>Accueil</h4></a></li>
                        <li><a href="Configuration.php"><h4>Configuration</h4></a></li>
                        <li><a href="Cueilleur.php"><h4>Gestion cueilleur</h4></a></li> 
                        <li><a href="traitement-php/disconnect.php"><h4>Se deconnecter</h4></a></li>
                    </div>
                </div>
            </nav>
        </center>
    </head>
    <body>
        <div class="container">
            <h2>Variété de thé</h2>
            
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Occupation</th>
                        <th scope="col">Rendement (par pied)</th>
                        <th scope="col">Prix de vente</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="tbody"></tbody>
            </table>
            <button type="button" class="btn btn-success" onclick="showAddForm1()">Ajouter</button>
            <div id="addForm1" style="display: none;">
              <h2>Ajouter un thé dans les variété </h2>
              <form id="addFormInner">
                  <div class="form-group">
                      <label for="nomtea">Nom du thé</label>
                      <input type="text" class="form-control" id="nomtea" placeholder="nom du thé ">
                  </div>
                  <div class="form-group">
                      <label for="occupation">Occupation</label>
                      <input type="number" class="form-control" id="occupation" placeholder="Occupation /m²">
                  </div>
                  <div class="form-group">
                      <label for="rendement">Rendement</label>
                      <input type="number" class="form-control" id="rendement" placeholder="Rendement /pied">
                  </div>
                  <div class="form-group">
                      <label for="prix">Prix de vente</label>
                      <input type="number" class="form-control" id="prix" placeholder="Prix /pied"  min="10000">
                  </div>
                  <button type="button" class="btn btn-primary" onclick="add1()">Ok</button>
                  <button type="button" class="btn btn-primary" onclick="cancel1()">Annuler</button>
              </form>
          </div>
            <br><br>

            <h2 >Parcelles</h2>
            
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Numéro de Parcelle</th>
                        <th scope="col">Numéro de Thé</th>
                        <th scope="col">Surface</th>
                        <th scope="col">Action</th>
                        
                    </tr>
                </thead>
                <tbody id="tbody-p"></tbody>
            </table>
            <button type="button" class="btn btn-success" onclick="showAddParcelleForm()">Ajouter</button>
        </div>

        <div id="addParcelleForm" style="display: none;">
            <h2>Ajouter une parcelle</h2>
            <form id="addParcelleFormInner">
                <div class="form-group" id="var_tea">
                    <label for="numThe">Numéro de thé</label>
                    <select name="nom" id="numThe" class="form-control"></select>
                </div>
                <div class="form-group">
                    <label for="surface">Surface</label>
                    <input type="number" class="form-control" id="surface" placeholder="Surface">
                </div>
                <button type="button" class="btn btn-primary" onclick="addParcelle()">Ok</button>
                <button type="button" class="btn btn-primary" onclick="cancelParcelle()">Annuler</button>
            </form>
        </div>
        
    </body>
    <script>
        function cancel1() {
          document.getElementById('addForm1').style.display = 'none';
        }
        function cancelParcelle() {
          document.getElementById('addParcelleForm').style.display = 'none';
        }
        function showAddParcelleForm() {
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
                        var select = document.getElementById("numThe");
                        select.innerHTML = "<option value=\"\">--Variété de thé--</option>";
                        
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

            xhr.open("GET", "traitement-php/liste/variete-list.php", true);
            xhr.send(null);
            
            document.getElementById('addParcelleForm').style.display = 'block';
        }

        function addParcelle() {
            var numThe = document.getElementById('numThe').value;
            var surface = document.getElementById('surface').value;

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

            xhr.open("GET", "traitement-php/insertion/ajout-parcelle.php?var=" + numThe + "&srf=" + surface, true);
            xhr.send(null);
            
            document.getElementById('addParcelleForm').style.display = 'none';
            update();
        }

        function showAddForm1() {
            document.getElementById('addForm1').style.display = 'block';
        }

        function add1() {
            var nomtea = document.getElementById('nomtea').value;
            var occupation = document.getElementById('occupation').value;
            var rendement = document.getElementById('rendement').value;
            var prix = document.getElementById("prix").value;

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

            xhr.open("GET", "traitement-php/insertion/ajout-variete.php?nom=" + nomtea + "&occ=" + occupation + "&rdm=" + rendement + "&prix=" + prix, true);
            xhr.send(null);
            document.getElementById('addForm1').style.display = 'none';
            update();
        }
        function getVarieteTea() {
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

                    var occ = document.createElement("td");
                    var occText = document.createTextNode(retour[i].occ + " m² par pied");
                    occ.appendChild(occText);
                    row.appendChild(occ);

                    var rdm = document.createElement("td");
                    var rdmText = document.createTextNode(retour[i].rendement + " par mois");
                    rdm.appendChild(rdmText);
                    row.appendChild(rdm);

                    var pr = document.createElement("td");
                    var prText = document.createTextNode(retour[i].prix);
                    pr.appendChild(prText);
                    row.appendChild(pr);

                    var inp = document.createElement("td");
                    var input = document.createElement("input");
                    input.className = "btn btn-danger";
                    input.type = "button";
                    input.value = "Supprimer";
                    input.onclick = function() {
                    supprimerVariete(retour[i].id);
                    }

                    inp.appendChild(input);
                    row.appendChild(inp);

                    table.appendChild(row);
                }
                } else {
                document.sub = "Error code " + xhr.status;
                }
            }
            };

            xhr.open("GET", "traitement-php/liste/variete-list.php", true);
            xhr.send(null);
        }

        function getParcelle() {
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
                var table = document.getElementById("tbody-p");
                table.innerHTML = " ";
                
                for (let i = 0; i < retour.length; i++) {
                    var row = document.createElement("tr");
                    
                    var th = document.createElement("th");
                    th.scope = row;
                    var thText = document.createTextNode(retour[i].num);
                    th.appendChild(thText);
                    row.appendChild(th);

                    var variete = document.createElement("td");
                    var varieteText = document.createTextNode(retour[i].variete);
                    variete.appendChild(varieteText);
                    row.appendChild(variete);

                    var srf = document.createElement("td");
                    var srfText = document.createTextNode(retour[i].surface + " ha");
                    srf.appendChild(srfText);
                    row.appendChild(srf);

                    var inp = document.createElement("td");
                    var input = document.createElement("input");
                    input.className = "btn btn-danger";
                    input.type = "button";
                    input.value = "Supprimer";
                    input.onclick = function() {
                    supprimerParcelle(retour[i].num);
                    }

                    inp.appendChild(input);
                    row.appendChild(inp);

                    table.appendChild(row);
                }
                } else {
                document.sub = "Error code " + xhr.status;
                }
            }
            };

            xhr.open("GET", "traitement-php/liste/parcelle-list.php", true);
            xhr.send(null);
        }

        function supprimerParcelle(id) {
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

            xhr.open("GET", "traitement-php/suppression/supprimer-parcelle.php?id=" + id, true);
            xhr.send(null);
            update();
        }

        function supprimerVariete(id) {
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

            xhr.open("GET", "traitement-php/suppression/supprimer-variete.php?id=" + id, true);
            xhr.send(null);
            update();
        }

        window.onload = function() {
            getVarieteTea();
            getParcelle();
        }

        function update() {
            getVarieteTea();
            getParcelle();
        }
    </script>
</html>
