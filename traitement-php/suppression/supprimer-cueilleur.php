<?php
include '../connexion.php';

try {
    $conn = connect();

    $id = $_GET['id'];

    $action = $conn->exec("DELETE FROM productionThé_cueilleur WHERE id_cueilleur = $id");
    echo "succesfully deleted";
} catch (PDOException $e) {
    print 'Erreur :'.$e->getMessage().'<br />';
    die();
}
?>