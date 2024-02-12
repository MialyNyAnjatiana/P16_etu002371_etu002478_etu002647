<?php
include '../connexion.php';

try {
    $conn = connect();

    $retour = null;

    $result = $conn->query("SELECT * FROM cueilleur AS c JOIN genre AS g ON c.id_genre=g.id_genre");
    $result->setFetchMode(PDO::FETCH_OBJ);

    while ($row = $result->fetch()) {
        $retour[] = array('id' => $row->id_cueilleur, 'nom' => $row->nom_cueilleur, 'dtn' => $row->dtn_c, 'genre' => $row->desc_genre, 'salaire' => $row->salaire);
    }

    echo json_encode($retour);
} catch (PDOException $e) {
    print 'Erreur :'.$e->getMessage().'<br />';
    die();
}
?>