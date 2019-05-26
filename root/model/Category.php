<?php 

class Category
{
	public function getAllCategories ($dbcon){
		$sql = "SELECT * FROM sport_category";
		$pst = $dbcon->prepare($sql);
		// $pst->bindParam(':id', $id);
		$pst->execute();
		
		$sport = $pst->fetchAll(PDO::FETCH_OBJ);
		return $sport;
	}

}





?>
