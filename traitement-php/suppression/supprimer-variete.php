<?php
include '../connexion.php';

try {
    $conn = connect();

    $id = $_GET['id'];

    $action = $conn->exec("DELETE FROM variete_tea WHERE id_var = $id");
    $action2 = $conn->exec("DELETE FROM parcelle WHERE id_var = $id");
    echo "succesfully deleted";
} catch (PDOException $e) {
    print 'Erreur :'.$e->getMessage().'<br />';
    die();
}
?>