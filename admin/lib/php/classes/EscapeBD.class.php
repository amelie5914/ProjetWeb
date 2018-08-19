<?php

class EscapeBD extends Escape {
   private $_db;
    private $_array = array();
    public function __construct($db) {
        $this->_db = $db;
    }
    public function getTexteEscape() {
        
        try {
            $query = "select * from escape";
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
    public function getIdEscape($nomEscape){
        try {
            $query = "select * from escape where nomescape= :nomescape";//:nomescape";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':nomescape', $nomEscape,PDO::PARAM_STR);
            $resultset->execute();
            $data = $resultset->fetchAll();
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
