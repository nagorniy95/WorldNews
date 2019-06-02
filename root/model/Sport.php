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

	public function addSport($dbcon, $title, $category, $author, $content, $date, $image){
		$sql = "INSERT INTO sport_news (title, category, author, 		content, date, image)
				VALUES (:title, :category, :author, :content, :date, :image)";
		$pst = $dbcon->prepare($sql);

		$pst->bindParam(':title', $title);
		$pst->bindParam(':category', $category);
		$pst->bindParam(':author', $author);
		$pst->bindParam(':content', $content);
		$pst->bindParam(':date', $date);
		$pst->bindParam(':image', $image);

		$count = $pst->execute();
		return $count;
	}
	
	public function deleteSport($id, $dbcon){
		$sql = "DELETE FROM sport_news WHERE id = :id";
		$pst = $dbcon->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();

        return $count;
	}

	public function updateSport($title, $category, $author, $content, $date, $image, $dbcon)
	{
		$sql = "UPDATE sport_news
				SET title=:title,
				category=:category,
				author = :author,
				content = :content,
				date = :date,
				image = :image
				WHERE id=:id";
		$pst = $dbcon->prepare($sql);

		$pst->bindParam(':title', $title);
		$pst->bindParam(':category', $category);
		$pst->bindParam(':author', $author);
		$pst->bindParam(':content', $content);
		$pst->bindParam(':date', $date);
		$pst->bindParam(':image', $image);

		$count = $pst->execute();

		return $count;
	}

	public function getSportById($id, $dbcon)
	{
		$sql = "SELECT * FROM sport_news WHERE id = :id";
		$pst = $dbcon->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();

        $sport = $pst->fetch(PDO::FETCH_OBJ);
        return $sport;
	}

}





?>
