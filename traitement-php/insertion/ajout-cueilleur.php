<?php
include '../connexion.php';

try {
    $conn = connect();

    $nom = $_GET['nom'];
    $dtn = $_GET['dtn'];
    $genre = $_GET['genre'];
    $salaire = $_GET['sal'];

    $sql = "INSERT INTO cueilleur VALUES (null, '$nom', '$dtn', $genre, $salaire)";
    $result = $conn->exec($sql);
    echo "success";
    $conn = null;
} catch (PDOException $e) {
    print 'Erreur :'.$e->getMessage().'<br />';
    die();
}
?>