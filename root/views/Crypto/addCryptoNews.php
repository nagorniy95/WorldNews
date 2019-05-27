<!-- Author: Artem Nahornyi; n01261269; -->
<?php
session_start();
$page_title = "Add Crypto News";
// ============ HEADER ==============
include "../../views/header.php"; 
require_once '../../model/Database.php';
require_once '../../model/Crypto.php';

if(isset($_POST['addnews'])){

    $title = $_POST['crypto_title'];
    $category = $_POST['crypto_category'];
    $author = $_POST['crypto_author'];
    $article = $_POST['crypto_article'];

    // image title
    $image_title = $_POST['crypto_image_title'];
    $image_title = str_replace( ' ', '-', $image_title);
    $image_title = preg_replace('/[^0-9a-zA-Z_]/', '', $image_title);

    // actual image file
    $image = $_FILES['crypto_image'];
    $extension = explode('.', $_FILES['crypto_image']['name']);
    $extension = array_pop($extension);
    $image = strtolower(time().'-'. $image_title.'.'.$extension);

    move_uploaded_file(
        $_FILES['crypto_image']['tmp_name'],
        __DIR__.'/images/'.$image
    );
    
    $db = Database::getDb();
    $c = new Crypto();
    $my_data = $c->addCrypto($title, $category, $author, $article, $image_title, $image, $db);

    echo "<h2 align='center' class='green'>New post added!</h2>";
}
?>
<div class="container">
    <h3 align="center">Add new Article</h3><br/>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="crypto_title">Title:</label><br/>
        <input type="text" name="crypto_title" id="crypto_title" required placeholder="Title..." class="form-control" /><br/>

        <label for="crypto_category">Category:</label><br/>
        <input type="text" name="crypto_category" id="crypto_category" required placeholder="Category..." class="form-control" /><br/>

        <label for="crypto_author">Author:</label><br/>
        <input type="text" name="crypto_author" id="crypto_author" placeholder="Author..." class="form-control" /><br/>

        <label for="crypto_article">Article:</label><br/>
        <textarea type="text" name="crypto_article" id="crypto_article" placeholder="Enter text here..." required rows="10" cols="80" class="form-control"></textarea><br/>

        <label for="crypto_image_title">Image Title:</label><br/>
        <input type="text" name="crypto_image_title" id="crypto_image_title" placeholder="Image title..." class="form-control" /><br/>

        <label for="crypto_image">Image:</label><br/>
        <input type="file" name="crypto_image" id="crypto_image"><br/>

        <input type="Reset" name="Reset" value="Reset" class="btn btn-default" />
        <input type="submit" name="addnews" value="Submit" class="btn btn-default" />
    </form>
</div>

<!-- ============ Footer ============ -->
<?php include "../../views/footer.php"; ?>

