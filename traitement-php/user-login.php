<?php
include 'connexion.php';

try {
    $login = $_POST['name'];
    $mdp = $_POST['pass'];

    $conn = connect();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM productionThé_utilisateur WHERE nom_user = '$login' AND mdp = '$mdp'";
    $stmt = $conn->query($sql);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $user = null;

    while ($row = $stmt->fetch()) {
        $user = array('id' => $row->id_user, 'name' => $row->nom_user);
    }

    if ($user['id'] != null) {
        session_start();
        $_SESSION['user'] = array();
        $_SESSION['user'] = $user;
        header('Location:../Accueil.php');
    } else {
        header('Location:../User.html');
    }
} catch (PDOException $e) {
    print 'Erreur :'.$e->getMessage().'<br />';
    die();
}
?>