<?php
include '../connexion.php';
session_start();

try {
    $conn = connect();

    $id = $_SESSION['user']['id'];
    $id_c = $_GET['c'];
    $date = $_GET['date'];
    $montant =$_GET['montant'];

    $sql = "INSERT INTO depense VALUES (null, $id, $id_c, '$date', $montant)";
    $result = $conn->exec($sql);
    echo "success";
    $conn = null;
} catch (PDOException $e) {
    print 'Erreur :'.$e->getMessage();
    die();
}
?>