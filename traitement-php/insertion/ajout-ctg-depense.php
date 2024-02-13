<?php
include '../connexion.php';

try {
    $conn = connect();

    $ctg = $_GET['ctg'];

    $sql = "INSERT INTO productionThé_ctg_depense VALUES (null, '$ctg')";
    $result = $conn->exec($sql);
    echo "success";
    $conn = null;
} catch (PDOException $e) {
    print 'Erreur :'.$e->getMessage().'<br />';
    die();
}
?>