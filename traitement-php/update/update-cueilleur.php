<?php
include '../connexion.php';

try {
    $conn = connect();

    $id_cueilleur = $_GET['id'];
    $sal = $_GET['new'];

    $sql = "UPDATE cueilleur SET salaire = $sal WHERE id_cueilleur = $id_cueilleur";
    $result = $conn->exec($sql);
    $conn = null;
    
} catch (PDOException $e) {
    print 'Erreur :'.$e->getMessage().'<br />';
    die();
}
?>