<?php
class Contact
{
	public function getContactById($id, $db){
        $sql = "SELECT * FROM contacts WHERE id = :id ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        $contact =  $pst->fetch(PDO::FETCH_OBJ);
        return $contact;
	}
	
    public function getAllContacts($dbcon){
        $sql = "SELECT * FROM CONTACTS";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        $contacts = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $contacts;
    }
	 public function addContact($name, $email, $subject, $message,$db)
    {
        $sql = "INSERT INTO contacts (name, email, subject, message) 
              VALUES (:name, :email, :subject, :message) ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':name', $name);
        $pst->bindParam(':email', $email);
        $pst->bindParam(':subject', $subject);
		$pst->bindParam(':message', $message);
        $count = $pst->execute();
        return $count;
    }
	 public function deleteContact($id, $db){
        $sql = "DELETE FROM contacts WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;
    }
    public function detailContact($id, $name,  $email, $subject, $message, $db){
        $sql = "SELECT * FROM CONTACTS
                WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->bindParam(':name', $name);
		$pst->bindParam(':email', $email);
        $pst->bindParam(':subject', $subject);
        $pst->bindParam(':message', $message);
        $count = $pst->execute();
        return $count;
    }
}
