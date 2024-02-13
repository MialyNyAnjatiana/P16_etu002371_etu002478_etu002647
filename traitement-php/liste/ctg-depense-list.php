<?php
include '../connexion.php';

try {
    $conn = connect();

    $retour = null;

        $result = $conn->query("SELECT * FROM ctg_depense");
        $result->setFetchMode(PDO::FETCH_OBJ);

        while ($row = $result->fetch()) {
            $retour[] = array('id' => $row->id_ctg, 'nom' => $row->ctg);
        }

        echo json_encode($retour);
    
    $conn = null;
} catch (PDOException $e) {
    print 'Erreur :'.$e->getMessage().'<br />';
    die();
}
?>