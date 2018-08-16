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
            $query = "select idescape from escape where nomescape='"+$nomEscape+"'";//:nomescape";
            $resultset = $this->_db->execute($query);
            var_dump($nomEscape);
            //$resultset->bindValue(':nomescape', $nomEscape,PDO::PARAM_STR);
           // $resultset->execute();
            $id = $resultset;//->fetch();
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        if (!empty($id)) {
            return $id;
        } else {
            return null;
        }
    }
}
