<?php 
class Finance
{
	public function getAllArticle($dbcon){
		$sql = "SELECT * FROM finance_news AS fn 
		JOIN finance_images AS fni
		on fn.image = fni.id";
		$fn = $dbcon->prepare($sql);
		
		$fn->execute();
		
		$finance = $fn->fetchAll(PDO::FETCH_OBJ);
		return $finance;
	}
	
	public function getArticleById($id, $db){

        $sql = "SELECT * FROM finance_news where id = :id";
        $pdost = $db->prepare($sql); 
        $pdost->bindParam(':id', $id);
        $pdost->execute();

        $finance = $pdost->fetch(PDO::FETCH_OBJ);
        return $finance;
    }
    public function addArticle($title, $category, $author, $content, $date, $image, $db){
         $sql = "INSERT INTO finance_images (file) 
                VALUES (:image)";
        $pst = $db->prepare($sql);
        $pst->bindParam(':image', $image);
        $result = $pst->execute();
        $imageid = $db->lastInsertId(); 
        $sql = "INSERT INTO finance_news (title, category, author, content, date, image)
                    VALUES(:title, :category, :author, :content, :date, :image)";
        $pdost = $db->prepare($sql);
        $pdost->bindParam(':title', $title);
        $pdost->bindParam(':category', $category);
        $pdost->bindParam(':author', $author);
        $pdost->bindParam(':content', $content);
        $pdost->bindParam(':date', $date);
		$pdost->bindParam(':image', $imageid);

        $count = $pdost->execute();
        return $count;
    }
    public function deleteArticle($id, $db){
        $sql = "DELETE FROM finance_news  WHERE id = :id";
        $pdost = $db->prepare($sql);
        $pdost->bindParam(':id', $id);

        $count = $pdost->execute();
        return $count;
    }
	 public function updateArticle($id, $title, $category, $autor, $content, $date, $image,$db){
        $sql = "UPDATE finance_news SET title = :title, category = :category,
                 author =  :author, content = content, date = :date, image =:image WHERE id = :id"; 
         $pdost = $db->prepare($sql);
         $pdost->bindParam(':id', $id);
         $pdost->bindParam(':title', $title);
         $pdost->bindParam(':category', $category);
         $pdost->bindParam(':author', $author);
         $pdost->bindParam(':content', $content);
         $pdost->bindParam(':date', $date);
		 $pdost->bindParam(':image', $image);

         $count = $pdost->execute();
         return $count;
    }
}


?>