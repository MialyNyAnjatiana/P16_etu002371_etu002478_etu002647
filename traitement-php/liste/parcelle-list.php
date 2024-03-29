<?php
include '../connexion.php';

try {
    $conn = connect();

    $retour = null;

    $result = $conn->query("SELECT * FROM productionThé_parcelle AS p JOIN productionThé_variete_tea AS v ON p.id_var=v.id_var");
    $result->setFetchMode(PDO::FETCH_OBJ);

    while ($row = $result->fetch()) {
        $retour[] = array('num' => $row->id_parcelle, 'variete' => $row->nom_tea, 'surface' => $row->surface, 'restant' => $row->restant);
    }

    echo json_encode($retour);
} catch (PDOException $e) {
    print 'Erreur :'.$e->getMessage().'<br />';
    die();
}
?>