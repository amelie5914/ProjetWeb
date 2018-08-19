<?php

class ClientBD extends Client {
   private $_db;
    private $_array = array();
    public function __construct($db) {
        $this->_db = $db;
    }
    public function getClient() {
        try {
            $query = "select * from client";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            while ($data = $resultset->fetch()) {
                $_array[] = $data;
            }
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        if (!empty($_array)) {
            return $_array;
        } else {
            return null;
        }
        
    }
     public function ajoutClient(array $data) {
        try {
            $query = "insert into client (nom,prenom,adresse,mdp,email) values (:nom,:prenom,:adresse,:mdp,:email)";
            //var_dump($query);
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':nom', $data['nom']);
            $resultset->bindValue(':prenom', $data['prenom']);
            $resultset->bindValue(':adresse', $data['adresse']);
            $resultset->bindValue(':mdp', $data['mdp']);
            $resultset->bindValue(':email', $data['email']);
            $i=$resultset->execute();
            if(!$i){
                var_dump('not done');
            }
            return $i;
            //$retour = $resultset->fetchColumn(0);
            //return $retour;
        } catch (PDOException $e) {
            print "<br/>Echec de l'insertion";
         }
    }
    public function connect($email,$mdp){
        try {
            $query = "select * from client where email=:email and mdp=:mdp";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':email', $email);
            $resultset->bindValue(':mdp', $mdp);
            $resultset->execute();
           while ($data = $resultset->fetch()) {
               try {
                    $client[] = new Client($data);
                    
                    if ($client[0]->email == $email && $client[0]->mdp ==$mdp ) {
                        return $client;
                    } else {
                        return null;
                    }
                } catch (PDOException $e) {
                    print $e->getMessage();
                }
                $_array[] = $data;
            }
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        if (!empty($_array)) {
            return $_array;
        } else {
            return null;
        }
            

    }
}

