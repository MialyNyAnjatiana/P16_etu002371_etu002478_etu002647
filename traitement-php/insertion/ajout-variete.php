<?php
include '../connexion.php';

try {
    $conn = connect();

    $nom = $_GET['nom'];
    $occ = $_GET['occ'];
    $rdm = $_GET['rdm'];
    $prix = $_GET['prix'];

    $sql = "INSERT INTO productionThé_variete_tea VALUES (null, '$nom', $occ, $rdm, $prix)";
    $result = $conn->exec($sql);
    echo "success";
    $conn = null;
} catch (PDOException $e) {
    print 'Erreur :'.$e->getMessage().'<br />';
    die();
}
?>