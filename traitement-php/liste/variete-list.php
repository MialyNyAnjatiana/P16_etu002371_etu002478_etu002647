<?php
include 'connexion.php';

try {
    $conn = connect();

    $retour = null;

    $result = $conn->query("SELECT * FROM variete_tea");
    $result->setFetchMode(PDO::FETCH_OBJ);

    while ($row = $result->fetch()) {
        $retour[] = array('nom' => $row->nom_tea, 'occ' => $row->occupation, 'rendement' => $row->rendement);
    }

    echo json_encode($retour);
} catch (PDOException $e) {
    print 'Erreur :'.$e->getMessage().'<br />';
    die();
}
?>