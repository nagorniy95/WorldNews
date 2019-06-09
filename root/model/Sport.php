<?php 

class Sport
{	
	public function getAllSportByCategory ($dbcon, $category){
		$sql = "SELECT * FROM sport_news
		WHERE category = :category";
		$pst = $dbcon->prepare($sql);
		$pst->bindParam(':category', $category);
		$pst->execute();
		
		$sport = $pst->fetchAll(PDO::FETCH_OBJ);
		return $sport;
	}
	public function getAllSport ($dbcon){
		$sql = "SELECT s.id, s.title, s.category, s.content, s.date, s.image, c.name
				FROM sport_news AS s
				JOIN sport_category As c
				ON s.category=c.id";
		$pst = $dbcon->prepare($sql);
		$pst->bindParam(':category', $category);
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

	public function updateSport($id, $title, $category, $author, $content, $date, $image, $dbcon)
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

		$pst->bindParam(':id', $id);
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
		$sql = "SELECT SELECT s.id, s.title, s.category, s.content, s.date, s.image, c.name
				FROM sport_news AS s
				JOIN sport_category As c
				ON s.category=c.id 
				WHERE id = :id";
		$pst = $dbcon->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();

        $sport = $pst->fetch(PDO::FETCH_OBJ);
        return $sport;
	}

}





?>
