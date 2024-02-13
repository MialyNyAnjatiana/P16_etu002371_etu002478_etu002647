<?php
    function connect() {
        $dsn = 'mysql:host=172.10.0.113;port=3306;dbname=';
        $user = 'ETU002647';
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