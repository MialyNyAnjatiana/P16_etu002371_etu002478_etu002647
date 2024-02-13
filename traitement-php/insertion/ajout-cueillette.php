<?php
include '../connexion.php';
session_start();

try {
    $conn = connect();

    $id = $_SESSION['user']['id'];
    $id_c = $_GET['c'];
    $id_p = $_GET['p'];
    $date = $_GET['date'];
    $poid =$_GET['poid'];

    $sql = "INSERT INTO cueillette VALUES (null, $id, $id_c, $id_p, '$date', $poid)";
    $result = $conn->exec($sql);

    echo "success";
    $conn = null;
} catch (PDOException $e) {
    print 'Erreur :'.$e->getMessage().'<br />';
    die();
}
?>