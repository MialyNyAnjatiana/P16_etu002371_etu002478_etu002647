<?php
include '../connexion.php';

try {
    $conn = connect();

    $id = $_POST['id'];
    $var = $_POST['var'];
    $occ = $_POST['occ'];
    $rdm = $_POST['rdm'];

    $sql = "UPDATE variete_tea SET nom_tea = '$var', occ = $occ, rendement = $rdm WHERE id_var = $id";
    $result = $conn->exec($sql);
    $conn = null;
    
} catch (PDOException $e) {
    print 'Erreur :'.$e->getMessage().'<br />';
    die();
}
?>