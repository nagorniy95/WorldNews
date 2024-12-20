<?php 
session_start();
require_once '../../model/Database.php';
require_once '../../model/Category.php';
require_once '../../model/Sport.php';

if($_SESSION['user_type'] == 'user' || !isset($_SESSION['loggedin'])){
    header("Location: ../login.php");
}

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
include dirname( __FILE__) . "../../admin-header.php";
 ?>
 <!-- <body> -->


    <div class="container-fluid p-0 fill-height">
    <div class="row no-gutters">
        <div class="col-md-2">
             <div class="admin-menu-wrapper">
                    <ul>
                        <li class="bb"><a href="#">Home</a></li>
                        <li class="bb">Pages <span class="admin-right">></span>
                            <ul>
                                <li>Sport <span class="admin-right">></span>
                                    <ul>
                                        <li><a href="category-admin.php" >Category</a></li>
                                        <li ><a href="sport-admin.php" class="admin-menu-active">News</a></li>
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
            <h1 class="admin-form-title">Sport News</h1>
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
                <input type="file" name="upfile" id="upfile" ><br>
                <input type="submit" name="addSport" value="Add New Sport News" class="form-button">
            </form>
            </div>
        </div>
        <div class="col-md-2">
            <div class="admin-list-wrapper">
                <h3 class="admin-list-title">List of News</h3>
                <?php 
                foreach($sport_news as $sport){
                echo "<p>" .  $sport->title . "</p>".
                     "<p class='admin-news-category'> Category: " . $sport->name . "<p>" .
                    "<form action='updateSport.php' method='post'>" .
                    "<input type='hidden' value='$sport->id' name='id' />".
                    "<input type='submit' value='Update' name='Update' class='admin-update' />".
                    "</form>" .
                    "<form action='deleteSport.php' method='post'>" .
                    "<input type='hidden' value='$sport->id' name='id' />".
                    "<input type='submit' value='Delete' name='Delete' class='admin-delete'/>".
                    "</form>";
                }
            ?>
            </div>
        </div>
    </div>
</div>  

</body>
</html>