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

	public function addCategory($dbcon, $name, $image, $description)
	{
		$sql = "INSERT INTO sport_category (name, image, description)
				VALUES (:name, :image, :description)";
		$pst = $dbcon->prepare($sql);

		$pst->bindParam(':name', $name);
		$pst->bindParam(':image', $image);
		$pst->bindParam(':description', $description);

		$count = $pst->execute();
		return $count;
	}

	public function deleteCategory($id, $dbcon){
		$sql = "DELETE FROM sport_category WHERE id = :id";
		$pst = $dbcon->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();

        return $count;
	}

	public function updateCategory($id, $name, $image, $description, $dbcon)
	{
		$sql = "UPDATE sport_category
				SET name=:name,
				image=:image,
				description = :description
				WHERE id=:id";
		$pst = $dbcon->prepare($sql);

		$pst->bindParam(':id', $id);
		$pst->bindParam(':name', $name);
		$pst->bindParam(':image', $image);
		$pst->bindParam(':description', $description);
		$count = $pst->execute();

		return $count;
	}
	public function getCategoryById($id, $dbcon)
	{
		$sql = "SELECT * FROM sport_category WHERE id = :id";
		$pst = $dbcon->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();

        $category = $pst->fetch(PDO::FETCH_OBJ);
        return $category;
	}


//---------------------------------------------------------------
}





?>
