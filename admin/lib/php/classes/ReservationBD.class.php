<?php

class ReservationBD extends Reservation {
   private $_db;
    private $_array = array();
    public function __construct($db) {
        $this->_db = $db;
    }
    public function getInfoReservation($idreservation){
        try {
            $query = "select * from reservation where idreservation=:idreservation";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':idreservation', $idreservation);
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
    public function getReservation() {
        try {
            $query = "select * from reservation";
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
    public function getIdReservation(){
         try {
            $query = "select max(idreservation) m from reservation";
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
     public function ajoutReservation(array $data) {
        try {
            $prix=$data['tarif']*$data['nbrepersonne'];
            //var_dump($prix);
            $query = "insert into reservation (idcli,idescape,date,commentaire,nbrepersonne,prix,heure) values (:idcli,:idescape,to_date(:date,'YYYY-MM-DD'),:commentaire,:nbrepersonne,:prix,:heure)";
            var_dump($data['date']);
            $resultset = $this->_db->prepare($query);
            
            $resultset->bindValue(':idcli', $data['idcli']);
            $resultset->bindValue(':idescape', $data['idescape']);
            $resultset->bindValue(':date', $data['date']);
            $resultset->bindValue(':commentaire', $data['commentaire']);
            $resultset->bindValue(':nbrepersonne', $data['nbrepersonne']);
            $resultset->bindValue(':prix', $prix);
            $resultset->bindValue(':heure', $data['heure']);
            $resultset->execute();
        } catch (PDOException $e) {
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
        }
    }
    public function supprimerReservation($idreservation){
        try {
            //var_dump($prix);
            $query = "delete from reservation where idreservation=:idreservation";
            //var_dump($query);
            $resultset = $this->_db->prepare($query);
            
            $resultset->bindValue(':idreservation', $idreservation);
            $i=$resultset->execute();
            if(!$i){
                var_dump('not done');
            }
            return $i;
        } catch (PDOException $e) {
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
        }
    }
}
