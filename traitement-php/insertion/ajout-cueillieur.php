<?php
include '../connexion.php';

try {
    $conn = connect();

    $nom = $_POST['nom'];
    $dtn = $_POST['dtn'];
    $genre = $_POST['genre'];
    $salaire = $_POST['sal'];

    $sql = "INSERT INTO productionThé_cueilleur VALUES (null, '$nom', $dtn, $genre, $salaire)";
    $result = $conn->exec($sql);
    echo "success";
    $conn = null;
} catch (PDOException $e) {
    print 'Erreur :'.$e->getMessage().'<br />';
    die();
}
?>