<?php
include '../connexion.php';

try {
    $conn = connect();

    $id = $_GET['id'];

    $action = $conn->exec("DELETE FROM parcelle WHERE id_parcelle = $id");
    echo "succesfully deleted";
} catch (PDOException $e) {
    print 'Erreur :'.$e->getMessage().'<br />';
    die();
}
?>