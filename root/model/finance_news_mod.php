<?php 
class Finance
{
	public function getAllArticle($dbcon){
		$sql = "SELECT * FROM finance_news";
		$pdostm = $dbcon->prepare($sql);
		
		$pdostm->execute();
		
		$financee = $pdostm->fetchAll(PDO::FETCH_OBJ);
		return $financee;
	}
	
	public function getArticleById($id, $db){

        $sql = "SELECT * FROM finance_news where id = :id";
        $pdost = $db->prepare($sql); 
        $pdost->bindParam(':id', $id);
        $pdost->execute();

        $finance = $pdost->fetch(PDO::FETCH_OBJ);
        return $finance;
    }
    public function addArticle($title, $category, $author, $content, $date, $image_title, $image, $db){
        
        $sql = "INSERT INTO finance_news (title, category, author, content, date, image_title,image)
                    VALUES(:title, :category, :author, :content, :date,  :image_title, :image)";
        $pdost = $db->prepare($sql);
        $pdost->bindParam(':title', $title);
        $pdost->bindParam(':category', $category);
        $pdost->bindParam(':author', $author);
        $pdost->bindParam(':content', $content);
        $pdost->bindParam(':date', $date);
	    $pdost->bindParam(':image_title', $image_title);
		$pdost->bindParam(':image', $image);


        $count = $pdost->execute();
        return $count;
    }
    public function deleteArticle($id, $db){
       
		$sql = "DELETE FROM finance_news WHERE id = :id";
        $pdost = $db->prepare($sql);
        $pdost->bindParam(':id', $id);
        $count = $pdost->execute();
        return $count;
		
    }
	 public function updateArticle($id, $title, $category, $author, $content, $date,$image_title, $image,$db){
        $sql = "UPDATE finance_news SET title = :title, category = :category,
                 author =  :author, content = :content, date = :date, image_title = :image_title, image =:image WHERE id = :id"; 
         $pdost = $db->prepare($sql);
         $pdost->bindParam(':id', $id);
         $pdost->bindParam(':title', $title);
         $pdost->bindParam(':category', $category);
         $pdost->bindParam(':author', $author);
         $pdost->bindParam(':content', $content);
         $pdost->bindParam(':date', $date);
		 $pdost->bindParam(':image_title', $image_title);
		 $pdost->bindParam(':image', $image);
		
		

         $count = $pdost->execute();
         return $count;
    }
}


?>