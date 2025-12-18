<?php

function getConnexion(){

      $dbhost = 'localhost';
      $dbuser = 'root';
      $dbpassword = '';
      $dbname = 'gcontact';

      $dsn = "mysql:host=$dbhost;dbname=$dbname;charset=utf8";

      try {

            $connexion = new PDO(
                  $dsn,
                  $dbuser,
                  $dbpassword,
                  [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                  ]
            );
            return $connexion;
      } catch (PDOException $e) {
                  
            // On crée UNE exception claire et contrôlée
            throw new Exception(
                  "Erreur de connexion à la base de données". $e->getMessage()
            );
      } 
}

getConnexion();

?>