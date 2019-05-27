<!-- Author: Artem Nahornyi; n01261269; -->
<?php 

class Crypto
{
    public function getCryptoById($id, $db){
        $sql = "SELECT * FROM crypto_news WHERE id = :id ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        $result =  $pst->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    
    public function getAllCrypto($dbcon){
        $sql = "SELECT * FROM crypto_news";
        $pdostm = $dbcon->prepare($sql); // prepare
        $pdostm->execute(); // execute
        $result = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    
} // end Crypto class