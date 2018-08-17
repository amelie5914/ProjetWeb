<?php

class ReservationBD extends Reservation {
   private $_db;
    private $_array = array();
    public function __construct($db) {
        $this->_db = $db;
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
     public function ajoutReservation(array $data) {
        try {
            $prix=$data['tarif']*$data['nbrepersonne'];
            //var_dump($prix);
            $query = "insert into reservation (idcli,idescape,date,commentaire,nbrepersonne,prix) values (:idcli,:idescape,:date,:commentaire,:nbrepersonne,:prix)";
            //var_dump($query);
            $resultset = $this->_db->prepare($query);
            /*var_dump($data['idcli']);
            var_dump($data['idescape']);
            var_dump($data['date']);*/
            $resultset->bindValue(':idcli', $data['idcli']);
            $resultset->bindValue(':idescape', $data['idescape']);
            $resultset->bindValue(':date', $data['date']);
            $resultset->bindValue(':commentaire', $data['commentaire']);
            $resultset->bindValue(':nbrepersonne', $data['nbrepersonne']);
            $resultset->bindValue(':prix', $prix);
            $resultset->execute();
        } catch (PDOException $e) {
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
        }
    }
}
