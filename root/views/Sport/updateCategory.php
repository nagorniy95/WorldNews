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

    // echo $category->id;
    echo $category->image;


}
if(isset($_POST['updCategory'])){
    //image upload--------------------------------------
    $file_temp = $_FILES['upfile']['tmp_name'];
    //original path and file name of the uploaded file
    $file_name = $_FILES['upfile']['name'];
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
    $description = $_POST['description'];
    // $image = $target_path;
    if(is_null($target_path) || $target_path == 'uploads/'){
        $image = $category->image;
    } else{
        $image = $target_path;
    }
    
    $dbcon = Database::getDb();
    $c = new Category();

    $count = $c->updateCategory($id, $name, $image, $description, $dbcon);
    if($count){
        header("Location: category-admin.php");
    } else {
        echo  "problem updating";
    }
}
 ?>
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
