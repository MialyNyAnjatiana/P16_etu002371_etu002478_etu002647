<?php
include 'connexion.php';

try {
    $login = $_POST['name'];
    $mdp = $_POST['pass'];

    $conn = connect();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM productionThé_utilisateur AS u JOIN productionThé_page_admin AS a ON u.id_user=a.id_user WHERE nom_user = '$login' AND mdp = '$mdp'";
    $stmt = $conn->query($sql);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $user = null;

    while ($row = $stmt->fetch()) {
        $user = array('id' => $row->id_user, 'nom' => $row->nom_user);
    }

    if ($user['id'] != null) {
        session_start();
        $_SESSION['admin'] = array();
        $_SESSION['admin'] = $user;
        header('Location:../AdminAccueil.php');
    } else {
        header('Location:../Admin.html');
    }
} catch (PDOException $e) {
    print 'Erreur :'.$e->getMessage().'<br />';
    die();
}
?>