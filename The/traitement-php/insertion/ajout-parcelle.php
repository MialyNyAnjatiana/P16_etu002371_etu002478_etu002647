<?php
include 'connexion.php';

try {
    $conn = connect();

    $var = $_POST['var'];
    $srf = $_POST['srf'];

    $sql = "INSERT INTO parcelle VALUES (null, $var, $srf)";
    $result = $conn->exec($sql);
    echo "success";
    $conn = null;
} catch (PDOException $e) {
    print 'Erreur :'.$e->getMessage().'<br />';
    die();
}
?>