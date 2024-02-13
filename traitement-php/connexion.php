<?php
    function connect() {
        $dsn = 'mysql:host=localhost;port=3306;dbname=db2';
        $user = 'root';
        $pass = '';
        
        try {
            $conn = new PDO($dsn, $user, $pass);
            return $conn;
        } catch (PDOException $e) {
            print 'Erreur :'.$e->getMessage().'<br />';
            die();
        }
    }
?>