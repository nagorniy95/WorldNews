<?php 
session_start();
require_once '../../model/Database.php';
require_once '../../model/Category.php';

if($_SESSION['user_type'] == 'user' || !isset($_SESSION['loggedin'])){
    header("Location: ../login.php");
}

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
                                        <li><a href="category-admin.php" class="admin-menu-active">Category</a></li>
                                        <li><a href="sport-admin.php">News</a></li>
                                    </ul>
                                </li>
                                <li><a href="../../views/finance_news/FinanceAdmin.php">Economics</a></li>
                                <li><a href="#">Crypto</a></li>
								  <li><a href="../../views/contact/messages.php">Messages</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Log Out <i class="fas fa-sign-in-alt admin-right"></i></a></li>
                    </ul>
                </div>
            </div>
        <div class="col-md-8">
            <div class="form-wrapper">
            <h1 class="admin-form-title">Sport Category</h1>
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
        </div>
        <div class="col-md-2">
            <div class="admin-list-wrapper">
                <h3 class="admin-list-title">List of Categories</h3>
                <?php 
                foreach($sport_category as $sport){
                echo "<p>" .  $sport->name . "</p>"  .
                    "<form action='updateCategory.php' method='post'>" .
                    "<input type='hidden' value='$sport->id' name='id' />".
                    "<input type='submit' value='Update' name='Update' class='admin-update'/>".
                    "</form>" .
                    "<form action='deleteCategory.php' method='post'>" .
                    "<input type='hidden' value='$sport->id' name='id' />".
                    "<input type='submit' value='Delete' name='Delete' class='admin-delete'/>".
                    "</form>";
                }
            ?>
            </div>
        </div>
    </div>
</div>
 	

