<?php
include '../connexion.php';
session_start();

try {
    $conn = connect();

    $id_cueilleur = $_GET['cueilleur'];
    $min = $_GET['val'];
    $bonus = $_GET['bonus'];
    $malus = $_GET['malus'];

    $sql = "INSERT INTO productionThé_constraint VALUES (null, $id_cueilleur, $min, $bonus, $malus)";
    $result = $conn->exec($sql);

    echo "success";
    $conn = null;
} catch (PDOException $e) {
    print 'Erreur :'.$e->getMessage().'<br />';
    die();
}
?>