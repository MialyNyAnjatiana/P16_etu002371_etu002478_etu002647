<?php
include '../connexion.php';

try {
    $conn = connect();

    $retour = null;

    $result = $conn->query("SELECT * FROM productionThé_variete_tea");
    $result->setFetchMode(PDO::FETCH_OBJ);

    while ($row = $result->fetch()) {
        $retour[] = array('id' => $row->id_var, 'nom' => $row->nom_tea, 'occ' => $row->occupation, 'rendement' => $row->rendement);
    }

    echo json_encode($retour);
} catch (PDOException $e) {
    print 'Erreur :'.$e->getMessage().'<br />';
    die();
}
?>