<?php
include '../connexion.php';

try {
    $conn = connect();

    $id = $_POST['id'];
    $var = $_POST['var'];
    $srf = $_POST['srf'];

    $sql = "UPDATE parcelle SET id_var = $var, surface = $srf WHERE id_parcelle = $id";
    $result = $conn->exec($sql);
    $conn = null;
    
} catch (PDOException $e) {
    print 'Erreur :'.$e->getMessage().'<br />';
    die();
}
?>