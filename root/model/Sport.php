<?php 

class Sport
{
	public function getAllSport ($dbcon){
		$sql = "SELECT * FROM sport_news";
		$pst = $dbcon->prepare($sql);
		// $pst->bindParam(':id', $id);
		$pst->execute();
		
		$sport = $pst->fetchAll(PDO::FETCH_OBJ);
		return $sport;
	}

}





?>
