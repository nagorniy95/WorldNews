<?php 
require_once '../../model/Database.php';
require_once '../../model/Category.php';

$dbcon = Database::getDb();
$c = new Category();


if(isset($_POST['updateCategory'])){
    $id = $_POST['id'];

    $dbcon = Database::getDb();
    $c = new Category();
    $category = $c->getCategoryById($id, $dbcon);

    echo $category->id;


}
if(isset($_POST['updCategory'])){
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
    //----------------------------------------------------------------



    $id = $_POST['cid'];
    $name = $_POST['name'];
    $image = $target_path;
    $description = $_POST['description'];
    
    $dbcon = Database::getDb();
    $c = new Category();

    $count = $c->updateCategory($id, $name, $image, $description, $dbcon);
    if($count){
        header("Location: index-admin.php");
    } else {
        echo  "problem updating";
    }
}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<form action="" method="post" enctype="multipart/form-data" class="CategoryForm">
 		<input type="hidden" name="cid" value="<?= $category->id; ?>" />
    	<label for="name">Name:</label><br>
    	<input type="text" name="name" id="name" value="<?= $category->name; ?>" /><br/>
    	<label for="description">Description: </label><br>
    	<textarea type="text" name="description" id="description" cols="30" rows="10"><?= $category->description; ?></textarea><br>
    	<label for="upfile">Select Image</label><br>
    	<input type="file" name="upfile" id="upfile" >
    	<input type="submit" name="updCategory" value="Update Category" class="form-button">
	</form>
 </body>
 </html>