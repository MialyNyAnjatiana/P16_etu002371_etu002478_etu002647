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

    xhr.open("GET", "../traitement-php/suppression/supprimer-parcelle.php?id=" + id, true);
    xhr.send(null);
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

    xhr.open("GET", "../traitement-php/suppression/supprimer-variete.php?id=" + id, true);
    xhr.send(null);
  }

  window.onload = function() {
    getVarieteTea();
    getParcelle();
  }