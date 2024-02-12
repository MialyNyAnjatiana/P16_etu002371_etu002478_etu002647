<?php
include '../connexion.php';

try {
    $conn = connect();

    $nom = $_POST['nom'];
    $occ = $_POST['occ'];
    $rdm = $_POST['rdm'];

    $sql = "INSERT INTO variete_tea VALUES (null, '$nom', $occ, $rdm)";
    $result = $conn->exec($sql);
    echo "success";
    $conn = null;
} catch (PDOException $e) {
    print 'Erreur :'.$e->getMessage().'<br />';
    die();
}
?>