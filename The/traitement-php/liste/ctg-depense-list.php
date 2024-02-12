<?php
include 'connexion.php';

try {
    $conn = connect();

    $produit = $_GET['p'];
    $retour = null;

    if ($produit != null) {
        $result = $conn->query("SELECT * FROM ctg_depense");
        $result->setFetchMode(PDO::FETCH_OBJ);

        while ($row = $result->fetch()) {
            $retour[] = array('id' => $row->id_ctg, 'nom_ctg' => $row->ctg);
        }

        echo json_encode($retour);
    } else {
        echo json_encode($retour);
    }
    
    $conn = null;
} catch (PDOException $e) {
    print 'Erreur :'.$e->getMessage().'<br />';
    die();
}
?>