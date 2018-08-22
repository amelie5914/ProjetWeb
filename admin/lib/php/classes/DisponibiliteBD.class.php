<?php

class DisponibiliteBD extends Disponibilite {
   private $_db;
    private $_array = array();
    public function __construct($db) {
        $this->_db = $db;
    }
    public function getDisponibilite() {
        try {
            $query = "select * from disponibilite where idreservation is null ";
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
    public function dispo($idescape,$date) {
        try {
            $query = "select * from disponibilite where idescape=:idescape and date=:date and idreservation=null";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':idescape', $idescape);
            $resultset->bindValue(':date', $date);
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
    
    public function dispoEscapeDate($idescape) {
        try {
            $query = "select distinct(date) d,iddate from disponibilite where idescape=:idescape  and idreservation is null";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':idescape', $idescape);
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
     public function dispoEscapeDateHeure($iddate) {
        try {
            $query = "select * from disponibilite where iddate=:iddate and idreservation is null";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':iddate', $iddate);
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
    public function nbreDispo() {
        try {
            $query = "select count(*) nbre from disponibilite where idreservation is null";
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
    
    public function updateDispo($idreservation,$idescape,$date,$heure){
        $format='%d';
        
         $iddate=$date;
         var_dump($idreservation,$idescape,$iddate,$heure);
        try{
            $query="update disponibilite set idreservation=:idreservation where idescape=:idescape and iddate=:iddate and heure=:heure";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':idreservation', $idreservation);
            $resultset->bindValue(':idescape', $idescape);
            $resultset->bindValue(':iddate', $iddate);
            $resultset->bindValue(':heure', $heure);
            $resultset->execute();
        } catch (PDOException $e) {
            print "<br/>Echec de l'insertion";
         }
    }
     public function ajoutDispo(array $data) {
        try {
            $iddate=$data['date']. strval($data['idescape']);
            $query = "insert into disponibilite (idescape,date,heure,iddate) values (:idescape,:date,:heure,:iddate)";
            //var_dump($query);
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':idescape', $data['idescape']);
            $resultset->bindValue(':date', $data['date']);
            $resultset->bindValue(':heure', $data['heure']);
            $resultset->bindValue(':iddate', $iddate);
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
    
}
?>