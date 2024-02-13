<?php
include '../connexion.php';

try {
    $conn = connect();

    $nom = $_GET['nom'];
    $occ = $_GET['occ'];
    $rdm = $_GET['rdm'];

    $sql = "INSERT INTO productionThé_variete_tea VALUES (null, '$nom', $occ, $rdm)";
    $result = $conn->exec($sql);
    echo "success";
    $conn = null;
} catch (PDOException $e) {
    print 'Erreur :'.$e->getMessage().'<br />';
    die();
}
?>