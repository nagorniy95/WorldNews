<?php
require_once '../../model/Database.php';
require_once '../../model/finance_news_mod.php';

//session_start();
// if(!isset($_SESSION['id'])){
	// header("Location: ../login.php");
// }
if(isset($_POST['update'])){
	  $db = Database::getDb();
      $fns = new Finance();
      $count = $fns->getArticleById($id, $db);
      echo $count->id;
}
 if(isset($_POST['updateArt'])){
	 
	 //image upload------------
	$image_title = $_POST['image_title'];
	$image_title = str_replace( ' ', '-', $image_title);
	$image_title = preg_replace('/[^0-9a-zA-Z_]/', '', $image_title);
	$image = $_FILES['image'];
	$extension = explode('.', $_FILES['image']['name']);
    $extension = array_pop($extension);
    $image = strtolower(time().'-'. $image_title.'.'.$extension);
    move_uploaded_file(
        $_FILES['image']['tmp_name'],
        __DIR__.'/images/'.$image
    );
    //--------------
	  
        $id = $_POST['fid'];
        $title = $_POST['title'];
        $category = $_POST['category'];
        $author = $_POST['author'];
        $content = $_POST['content'];
        $date = $_POST['date'];
		$image_title =$_POST['image_title'];
		$image = $_POST['image'];

            $db = Database::getDb();
            $fns = new Finance();
            $count = $fns->updateArticle($id, $title, $category, $author, 
                $content, $date,$image_title,$image,$db);

            if($count){
                header("Location: FinanceAdmin.php");
                
            }
             else {
        echo  "problem updating";
    }
        
 }
	 
?>
<div class="content">
	 <div class="container">
	  <div class="row">
		<div class="col-md-12">
			

	
<form action="" method="post" id="financeUpdate" enctype="multipart/form-data">
    <h2>Update</h2>
            <input type="hidden" name="fid" value="<?= $count->id; ?>" />
            <div id="fin_edit_title">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="<?=$count->title; ?>" /><br/>
            </div>
            <div id="edit_category">
			<label for="category">Category:</label>
			<select id="category" name="category"  class="form-control">
			<option value="Default" <?php if($count->category == 'default') echo "selected"; ?> >Default</option>
			  <option value="Banking" <?php if($count->category == 'banking') echo "selected"; ?> >Banking</option>
			  <option value="Insurance"<?php if($count->category == 'insurance') echo "selected"; ?>>Insurance</option>
			  <option value="Markets"<?php if($count->category == 'markets') echo "selected"; ?>>Markets</option>
			  <option value="Investment"<?php if($count->category == 'investment') echo "selected"; ?>>Investment</option>
			  <option value="Personal Finance"<?php if($count->category == 'personal finance') echo "selected"; ?>>Personal Finance</option>
		  </select>
		  </div>
            <div id="edit_author">
                <label for="author">Author:</label>
                <input type="text" id="author" name="author" value="<?=$count->author; ?>"/><br/> 
            </div>
            <div id="content">
                <label for="content">Article:</label>
				 <textarea type="text" id="content" name="content" value="<?=$count->content; ?>"  required rows="12" cols="80" class="form-control"></textarea><br/>
            </div>
            <div id="edit_date">
                <label for="date">Date:</label>
                <input type="text" id="date" name="date" value="<?=$count->date; ?>" /><br/>
            </div>
			<div id="edit_image_title">
                <label for="image_title">Image Title:</label>
                <input type="text" id="image_title" name="image" value="<?=$count->image_title; ?>" class="btn btn-default"/><br/>		 
            </div>
			 <div id="edit_image">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" value="<?=$count->image; ?>" class="btn btn-default"/><br/>		 
            </div>
			
                <input type="submit" name="updateArt" value="Edit" id="financeUpdate">
     
	
</form>
  </div>
	</div>
	</div>
	</div>
</body>

</html>	
	
	