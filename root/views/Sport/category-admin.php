<?php 

require_once '../../model/Database.php';
require_once '../../model/Category.php';

$dbcon = Database::getDb();
$c = new Category();
$sport_category = $c->getAllCategories($dbcon);

if(isset($_POST['addCategory'])){
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

$name = $_POST['name'];
$image = $target_path;
$description = $_POST['description'];


$c->addCategory($dbcon, $name, $image, $description);
 header("Location: category-admin.php");
}
include dirname( __FILE__) . "../../admin-header.php";
 ?>
 <h1>Sport Category</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <ul>
                <li><a href="#">Sport Categories</a></li>
                <li><a href="sport-admin.php">Sport News</a></li>
            </ul>
        </div>
        <div class="col-md-6">
            <form action="" method="post" enctype="multipart/form-data" class="CategoryForm" id="ajaxForm">
                <label for="name">Name:</label><br>
                <input type="text" name="name" id="name" /><br/>
                <label for="description">Description: </label><br>
                <textarea type="text" name="description" id="description" cols="30" rows="10"></textarea><br>
                <label for="upfile">Select Image</label><br>
                <input type="file" name="upfile" id="upfile" ><br>
                <input type="submit" name="addCategory" value="Add New Category" class="form-button">
            </form>
        </div>
        <div class="col-md-4">
            <?php 
                foreach($sport_category as $sport){
                echo "<li>" .  $sport->name  .
                    "<form action='updateCategory.php' method='post'>" .
                    "<input type='hidden' value='$sport->id' name='id' />".
                    "<input type='submit' value='updateCategory' name='updateCategory' />".
                    "</form>" .
                    "<form action='deleteCategory.php' method='post'>" .
                    "<input type='hidden' value='$sport->id' name='id' />".
                    "<input type='submit' value='deleteCategory' name='deleteCategory' />".
                    "</form>" .
                    "</li>";
                }
            ?>
        </div>
    </div>
</div>
 	

