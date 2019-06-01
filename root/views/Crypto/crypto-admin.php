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
    <h2 align="center">ADMIN</h2>
    <h3 align="center">Add new Article</h3><br/>
    <form action="#" method="POST" enctype="multipart/form-data">
        <label for="crypto_title">Title:</label><br/>
        <input type="text" name="crypto_title" id="crypto_title" required placeholder="Title..." class="form-control" /><br/>

        <label for="crypto_category">Category:</label><br/>
        <input type="text" name="crypto_category" id="crypto_category" required placeholder="Category..." class="form-control" /><br/>

        <label for="crypto_author">Author:</label><br/>
        <input type="text" name="crypto_author" id="crypto_author" placeholder="Author..." class="form-control" /><br/>

        <label for="crypto_article">Article:</label><br/>
        <textarea type="text" name="crypto_article" id="crypto_article" placeholder="Enter text here..." required rows="8" class="form-control"></textarea><br/>

        <label for="crypto_image_title">Image Title:</label><br/>
        <input type="text" name="crypto_image_title" id="crypto_image_title" placeholder="Image title..." class="form-control" /><br/>

        <label for="crypto_image">Image:</label><br/>
        <input type="file" name="crypto_image" id="crypto_image"><br/>

        <input type="Reset" name="Reset" value="Reset" class="btn btn-default" />
        <input type="submit" name="addnews" value="Submit" class="btn btn-default" /><br/><br/>
        <input type="button" value="Go Back to Crypto News" class="btn btn-default" onClick="document.location.href='../Crypto/crypto.php'" />    </form><hr>
<!-- ==================================== Author NEWS ==================================== -->
<!-- ===================================================================================== -->
<?php $c = new Crypto(); $mynews = $c->getAllCrypto(Database::getDb()); ?>
    <div class="row">
        <h3 align="center">Crypto News List</h3><br>
        <?php foreach($mynews as $news){ ?>
        <div class='col-md-4 col-sm-6 col-12' align="center">
            <img class="crypto_news_image" src="images/<?php echo $news->file; ?>" height="250px">
            <h4><a href="cryptoArticle.php?id=<?php echo $news->id; ?>"><?php echo $news->title; ?></a></h4>
            <div class="row">
                <form action='updateCrypto.php' method='POST' class="col-md-6">
                    <input type='hidden' value='<?= $news->id; ?>' name='id' />
                    <input type='submit' value='Update' name='update' class="btn btn-default" />
                </form>
                <form action='deleteCrypto.php' method='POST' class="col-md-6">
                    <input type='hidden' value='<?= $news->id; ?>' name='id' />
                    <input type='submit' value='Delete' name='delete' class="btn btn-default" onclick="return confirm('Are you sure to delete?')" />
                </form>
            </div>
        </div>
        <?php }; ?>
    </div>
</div><!-- end container -->


<!-- ============ Footer ============ -->
<?php include "../../views/footer.php"; ?>

