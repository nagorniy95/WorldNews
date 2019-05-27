<!-- Author: Artem Nahornyi; n01261269; -->
<?php
session_start();
$page_title = "AddCryptoNews";
// ============ HEADER ==============
include "../../views/header.php"; 
require_once '../../model/Database.php';
require_once '../../model/Crypto.php';

if(isset($_POST['addnews'])){
    echo "<h2>Add new category</h2>";
    $title = $_POST['title'];
    $category = $_POST['category'];
    $author = $_POST['author'];
    $article = $_POST['article'];
    $image_title = $_POST['image_title'];
    $image = $_POST['image'];
    
    $db = Database::getDb();
    $c = new Category();
    $my_data = $c->addCategory($title, $category, $author, $article, $image_title, $image, $db);
}
?>
<div class="container">
    <h3 align="center">Add new Article</h3><br/>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="crypto_title">Title:</label><br/>
        <input type="text" name="title" id="crypto_title" required placeholder="Title..." class="form-control" /><br/>

        <label for="crypto_category">Category:</label><br/>
        <input type="text" name="crypto_category" id="crypto_category" required placeholder="Category..." class="form-control" /><br/>

        <label for="crypto_author">Author:</label><br/>
        <input type="text" name="crypto_author" id="crypto_author" placeholder="Author..." class="form-control" /><br/>

        <label for="crypto_article">Article:</label><br/>
        <textarea type="text" name="crypto_article" id="crypto_article" placeholder="Enter text here..." required rows="10" cols="80" class="form-control"></textarea><br/>

        <label for="crypto_image_title">Image Title:</label><br/>
        <input type="text" name="crypto_image_title" id="crypto_image_title" placeholder="Image title..." class="form-control" /><br/>

        <label for="crypto_image">Image:</label><br/>
        <input type="file" name="image" id="crypto_image"><br/>

        <input type="Reset" name="Reset" value="Reset" class="btn btn-default" />
        <input type="submit" name="addnews" value="Submit" class="btn btn-default" />
    </form>
</div>
<!-- ============ Footer ============ -->
<?php include "../../views/footer.php"; ?>

