<?php
require_once '../../model/Database.php';
require_once '../../model/finance_news_mod.php';

 if(isset($_POST['update'])){
        $id = $_POST['id'];

        $db = Database::getDb();
        $updNews = new Finance();
        $fnews = $updNews->getArticleByID($id, $db);

        $title = $fnews->title;
        $category = $fnews->category;
        $author = $fnews->author;
        $content =$fnews->content;
		$date =$fnews->date;
		$image =$fnews->image;
    }
	
	 if(isset($_POST['updArticle'])){

        $id = $_POST['aid'];
        $title = $_POST['title'];
        $category = $_POST['category'];
        $author = $_POST['author'];
        $content = $_POST['content'];
        $date = $_POST['date'];
		$image = $_POST['image'];

 
        if($title == ""){
            echo "Please Enter a Title";
        }elseif($category == "") {
            echo "Please Enter a Category";
        }elseif($author == "") {
            echo "Please Enter a Author Name";
        }elseif($content == "") {
            echo "Please Enter an Article";
		}elseif($date == "") {
            echo "Please Enter date";
		}elseif($image == "") {
            echo "Please Upload an Image";
        }else{
            $db = Database::getDb();
            $updFin = new Finance();
            $count = $updFin->updateArticle($id, $title, $category, $author, 
                $content, $date,$image, $db);

            if($count){
                header("Location: FinanceAdmin.php");
                
            }
            exit;
        }
        
    }

?>
	
<form action="" method="post" id="financeUpdate">
    <h2>Update</h2>
    <input type="hidden" name="eid" value="<?= $fnews->id; ?>" />
        <div id="EditFinanceForm">

            <div id="fin_edit_title">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value=
                "<?=$fnews->title; ?>" /><br/>
            </div>
            <div id="edit_category">
			<label for="category">Category:</label>
			<select id="category" name="category" placeholder="Category..." class="form-control" value=
					"<?=$fnews->category; ?>">
			  <option value="Banking">Banking</option>
			  <option value="Insurance">Insurance</option>
			  <option value="Markets">Markets</option>
			  <option value="Investment">Investment</option>
			  <option value="Personal Finance">Personal Finance</option>
		  </select></br>
            <div id="edit_author">
                <label for="author">Author:</label>
                <input type="text" id="image" name="image" value=
                "<?=$fnews->author; ?>"/><br/> 
            </div>
            <div id="content">
                <label for="content">Article:</label>
				 <textarea type="text" id="content" name="content" value=
                "<?=$fnews->content; ?>" placeholder="Type..." required rows="12" cols="80" class="form-control"></textarea><br/>
            </div>
            <div id="edit_date">
                <label for="date">Date:</label>
                <input type="text" id="date" name="date" value=
                "<?=$fnews->date; ?>" /><br/>
            </div>
			 <div id="edit_image">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" value=
                "<?=$fnews->image; ?>" class="btn btn-default"/><br/>
				 <input type="Reset" name="Reset" value="Reset" class="btn btn-default" />
            </div>
                <input type="submit" name="financeUpdate" value="Edit" id="financeUpdate">
        </div>
</form>
</body>

</html>	
	
	