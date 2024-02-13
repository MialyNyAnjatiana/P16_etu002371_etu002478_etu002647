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
                        update(retour[i].id);
                    }

                    inp2.appendChild(input2);
                    row.appendChild(inp2);

                    table.appendChild(row);
                    
                }
            }
        }
    }

    xhr.open("GET", "traitement-php/liste/cueilleur-list.php", true);
    xhr.send(null);
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

    xhr.open("GET", "../traitement-php/suppression/supprimer-cueillir.php?id=" + id, true);
    xhr.send(null);
  }

  

window.onload = function() {
    getListeCueilleur();
}