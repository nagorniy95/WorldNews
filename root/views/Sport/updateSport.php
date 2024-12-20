<?php 
session_start();
require_once '../../model/Database.php';
require_once '../../model/Sport.php';
require_once '../../model/Category.php';

$dbcon = Database::getDb();

$c = new Category();
$category = $c->getAllCategories($dbcon);
if(isset($_POST['Update'])){
    $id = $_POST['id'];

    $dbcon = Database::getDb();
    $s = new Sport();
    $sport = $s->getSportById($id, $dbcon);
}
if(isset($_POST['updSport'])){
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



    $id = $_POST['sid'];
	$title = $_POST['title'];
	$category_id = $_POST['category_id'];
	$author = $_POST['author'];
	$content = $_POST['content'];
	$date = date("Y.m.d");

    if(is_null($target_path) || $target_path == 'uploads/'){
        $image = $sport->image;
    } else{
        $image = $target_path;
    }
    
    $dbcon = Database::getDb();
    $s = new Sport();

    $count = $s->updateSport($id, $title, $category_id, $author, $content, $date, $image, $dbcon);
    
    if($count){
        header("Location: sport-admin.php");
    } else {
        echo  "problem updating";
    }
}
include dirname( __FILE__) . "../../admin-header.php";
 ?>


    <div class="container-fluid p-0">
    <div class="row no-gutters">
            <div class="col-md-2">
                <div class="admin-menu-wrapper">
                    <ul>
                        <li class="bb"><a href="#">Home</a></li>
                        <li class="bb">Pages <span class="admin-right">></span>
                            <ul>
                                <li>Sport <span class="admin-right">></span>
                                    <ul>
                                        <li><a href="category-admin.php">Category</a></li>
                                        <li><a href="sport-admin.php" class="admin-menu-active">News</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Economics</a></li>
                                <li><a href="#">Crypto</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Log Out <i class="fas fa-sign-in-alt admin-right"></i></a></li>
                    </ul>
                </div>
            </div>
        <div class="col-md-10">
            <div class="form-wrapper">
            <h1 class="admin-form-title">Sport Category</h1>
            <form action="" method="post" enctype="multipart/form-data" class="CategoryForm">
        <input type="hidden" name="sid" value="<?= $sport->id; ?>" />
        <label for="title">Title:</label><br>
        <input type="text" name="title" id="title" value="<?= $sport->title; ?>" /><br/>
        <label for="category_id">Select the category</label><br>
        <select name="category_id" id="category_id" >
        <?php foreach ($category as $cat){
            echo "<option value='$cat->id'>" . $cat->name . "</option>";
        }?>      
        </select><br />
        <label for="title">Author:</label><br>
        <input type="text" name="author" id="author" value="<?= $sport->author; ?>" /><br/>
        <label for="content">Content: </label><br>
        <textarea type="text" name="content" id="content" cols="30" rows="10"><?= $sport->content; ?></textarea><br>
        <label for="upfile">Select Image</label><br>
        <input type="file" name="upfile" id="upfile" >
        <input type="submit" name="updSport" value="Update Sport News" class="form-button">
    </form>     
            </div>
        </div>
    </div>
</div>
</body>