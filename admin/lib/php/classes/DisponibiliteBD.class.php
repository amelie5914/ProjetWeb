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
            $query = "select * from disponibilite where idescape=:idescape  and idreservation is null";
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
     public function dispoEscapeDateHeure($idescape,$date) {
        try {
            $query = "select * from disponibilite where idescape=:idescape and date=:date and idreservation is null";
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
}
?>