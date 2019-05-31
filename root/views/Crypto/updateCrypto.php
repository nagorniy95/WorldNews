<!-- Author: Artem Nahornyi; n01261269; -->
<?php
session_start();
$page_title = "Update Article";
// ============ HEADER ==============
include "../../views/header.php"; 
require_once '../../model/Database.php';
require_once '../../model/Crypto.php';

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $db = Database::getDb();
    $c = new Crypto();
    $crypto = $c->getCryptoById($id, $db);
}

if(isset($_POST['updatecypto'])){
    $id = $_POST['cid'];

    $title = $_POST['crypto_title'];
    $category = $_POST['crypto_category'];
    $author = $_POST['crypto_author'];
    $article = $_POST['crypto_article'];

    // image title
    $image_title = $_POST['crypto_image_title'];
    // $image_title = str_replace( ' ', '-', $image_title);
    // $image_title = preg_replace('/[^0-9a-zA-Z_]/', '', $image_title);

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
    $my_data = $c->updateCrypto($id, $title, $category, $author, $article, $image_title, $image, $db);

    header("Location: ./crypto-admin.php");
    die();
}
?>
<div class="container">
    <h2 align="center">ADMIN</h2>
    <h3 align="center">Update Article</h3><br/>
    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="cid" value="<?= $crypto->id; ?>" />

        <label for="crypto_title">Title:</label><br/>
        <input type="text" name="crypto_title" id="crypto_title" required value="<?= $crypto->title; ?>" class="form-control" /><br/>

        <label for="crypto_category">Category:</label><br/>
        <input type="text" name="crypto_category" id="crypto_category" required value="<?= $crypto->category; ?>" class="form-control" /><br/>

        <label for="crypto_author">Author:</label><br/>
        <input type="text" name="crypto_author" id="crypto_author" value="<?= $crypto->author; ?>" class="form-control" /><br/>

        <label for="crypto_article">Article:</label><br/>
        <textarea type="text" name="crypto_article" id="crypto_article" required rows="8" class="form-control"><?= $crypto->article; ?></textarea><br/>

        <label for="crypto_image_title">Image Title:</label><br/>
        <input type="text" name="crypto_image_title" id="crypto_image_title" value="<?= $crypto->name; ?>" class="form-control" /><br/>

<!-- DISPLAY THE CURRENT IMAGE -->

        <label for="crypto_image">Image:</label><br/>
        <input type="file" name="crypto_image" id="crypto_image"><br/>

        <input type="Reset" name="Reset" value="Reset" class="btn btn-default" />
        <input type="submit" name="updatecypto" value="Save" class="btn btn-default" /><br/><br/>
        <input type="button" value="Go Back" class="btn btn-default" onClick="document.location.href='../Crypto/crypto-admin.php'" /> 
    </form>
</div><!-- end container -->


<!-- ============ Footer ============ -->
<?php include "../../views/footer.php"; ?>

