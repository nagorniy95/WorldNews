<?php
session_start();
$page_title = "Article";
include "../../views/header.php"; 
require_once '../../model/Database.php';
require_once '../../model/Crypto.php';

$id = $_GET['id'];

$db = Database::getDb();
$c = new Crypto();
$article = $c->getCryptoById($id, $db);

// API URL
$json_url = "https://min-api.cryptocompare.com/data/v2/news/?lang=EN";
// get JSON data
$json = file_get_contents($json_url);
// convert json to array format
$data = json_decode($json);

?>

<div class="container">
    <!-- ==================================== Author NEWS ==================================== -->
    <div class="row">
        <div class='col-md-8'>
            <div class="article">
            	<div class="article_crop_image">
                	<img class="crypto_news_image" src="images/<?php echo $article->file; ?>">
                </div>
                <h4 class="uppercase"><?php echo $article->title; ?></h4 class="uppercase">
                <p><?php echo $article->article; ?></p>
                <p>Author: <?php echo $article->author; ?></p>
            </div>
            <a href="../../views/Crypto/crypto.php" name="go back to crypto page" class="crypto_button">Go Back to Previous Page</a>
        </div>
        <div class="col-md-4">
        	<?php for($i=10; $i<25; $i = $i + 5){; ?>
        		<div class="article">
        			<div class="crop">
	        			<img src="<?php echo $data->Data[$i]->imageurl;?>">
	        		</div>
	        		<h5><a href="<?php echo $data->Data[$i]->url;?>" target="blank"><?php echo $data->Data[$i]->title;?></a></h5>
        		</div>
        	<?php }; ?> 
        </div>
    </div>
</div><!-- end container -->

<!-- ============ Footer ============ -->
<?php include "../../views/footer.php"; ?>