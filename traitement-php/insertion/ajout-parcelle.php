<?php
include '../connexion.php';

try {
    $conn = connect();

    $var = $_GET['var'];
    $srf = $_GET['srf'];

    $sql = "INSERT INTO parcelle VALUES (null, $var, $srf)";
    $result = $conn->exec($sql);
    echo "success";
    $conn = null;
} catch (PDOException $e) {
    print 'Erreur :'.$e->getMessage().'<br />';
    die();
}
?>