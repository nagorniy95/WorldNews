<?php 
require_once '../../model/Database.php';
require_once '../../model/Category.php';
require_once '../../model/Sport.php';
$dbcon = Database::getDb();
$c = new Category();
$s = new Sport();
$category = $c->getAllCategories($dbcon);
$sport_news = $s->getAllSport($dbcon);
if(isset($_POST['addSport'])){
    //image upload--------------------------------------
    $file_temp = $_FILES['upfile']['tmp_name'];
    //original path and file name of the uploaded file
    $file_name = $_FILES['upfile']['name'];
    //size of the uploaded file in bytes
    $file_size = $_FILES['upfile']['size'];
    //type of the file(if browser provides)
    $file_type = $_FILES['upfile']['type'];
    //error number
    $file_error = $_FILES['upfile']['error'];
    
    //folder to move the uploaded file
    $target_path = "uploads/";
    $target_path = $target_path .  $_FILES['upfile']['name'];
    ////move the uploaded file from tempe path to taget path
    if(move_uploaded_file($_FILES['upfile']['tmp_name'], $target_path)) {
        echo "The file ".  $_FILES['upfile']['name'] . " has been uploaded ";
    } else{
        echo "There was an error uploading the file, please try again!";
	}


	$title = $_POST['title'];
	$category_id = $_POST['category_id'];
	$author = $_POST['author'];
	$content = $_POST['content'];
	$date = date("Y.m.d");
	$image = $target_path;

	$s->addSport($dbcon, $title, $category_id, $author, $content, $date, $image);
	header("Location: sport-admin.php");

}
 ?>
 <!-- <body> -->
 	<form action="" method="post" enctype="multipart/form-data" class="CategoryForm">
    	<label for="title">Title:</label><br>
    	<input type="text" name="title" id="title" /><br/>
		<label for="category_id">Select the category</label><br>
		<select name="category_id" id="category_id" >
        <?php foreach ($category as $cat){
            echo "<option value='$cat->id'>" . $cat->name . "</option>";
        }?>      
    	</select><br />
    	<label for="title">Author:</label><br>
    	<input type="text" name="author" id="author" /><br/>
		<label for="content">Description: </label><br>
    	<textarea type="text" name="content" id="content" cols="30" rows="10"></textarea><br>
    	<label for="upfile">Select Image</label><br>
    	<input type="file" name="upfile" id="upfile" >
    	<input type="submit" name="addSport" value="Add New Sport News" class="form-button">
	</form>
	<br>
	<br>
	<br>
	<br>
	<?php 
	foreach($sport_news as $sport){
    echo "<li>" .  $sport->title  .
    	 "<form action='updateSport.php' method='post'>" .
         "<input type='hidden' value='$sport->id' name='id' />".
         "<input type='submit' value='updateSport' name='updateSport' />".
         "</form>" .
         "<form action='deleteSport.php' method='post'>" .
         "<input type='hidden' value='$sport->id' name='id' />".
         "<input type='submit' value='deleteSport' name='deleteSport' />".
         "</form>" .
         "</li>";
}
	 ?>