<?php
include '../connexion.php';
session_start();
try {
    $conn = connect();

    $retour = null;
    $id = $_SESSION['user']['id'];

    $result = $conn->query("SELECT * FROM productionThé_depense AS p JOIN productionThé_variete_tea AS v ON p.id_var=v.id_var WHERE p.id_user = $id");
    $result->setFetchMode(PDO::FETCH_OBJ);

    while ($row = $result->fetch()) {
        $retour[] = array('num' => $row->id_parcelle, 'variete' => $row->nom_tea, 'surface' => $row->surface);
    }

    echo json_encode($retour);
} catch (PDOException $e) {
    print 'Erreur :'.$e->getMessage().'<br />';
    die();
}
?>