<?php
require_once '../../model/Database.php';
require_once '../../model/finance_news_mod.php';
require_once '../../views/admin-header.php';

session_start();

	//if (isset($_SESSION['id'])){
	
	//$id_user = $_SESSION['id'];
	$db = Database::getDb();
	$id = $_POST['id'];
	$f = new Finance();
	$finance = $f->getArticleById($id,$db);
	



?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/style.css" >
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	 <!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/style.css" >
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
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
                                        <li><a href="../../views/sport/category-admin.php" >Category</a></li>
                                        <li ><a href="../../views/sportsport-admin.php" class="admin-menu-active">News</a></li>
                                    </ul>
                                </li>
                                <li><a href="../../views/finance_news/FinanceAdmin.php">Economics</a></li>
                                <li><a href="../../crypto/crypto-admin.php">Crypto</a></li>
								<li><a href="../../contact/messages.php">Messages</a></li>
                            </ul>
                        </li>
                        <li><a href="../../views/login/logout.php">Log Out <i class="fas fa-sign-in-alt admin-right"></i></a></li>
                    </ul>
                </div>
        </div>
        <div class="col-md-8">
            <div class="form-wrapper">
            <h1 class="admin-form-title">ECONOMIC NEWS</h1>
           <br/>
				
				<h1><?php echo $finance->title; ?></h1>
		        <?php
		       echo  "Category : " . $finance->category . "<br /><br/>";
		       echo  "Author : " . $finance->author . "<br /></br>";
		       echo  "Content: " . $finance->content . "<br /><br/>";   
               echo  "Date: " . $finance->date . "<br /><br/>";  
			   echo  "Image Title: " . $finance->image_title . "<br /><br/>";  
               echo "<img class='ArticlePhoto' src= 'images/$finance->image 'style=\"width:300px;\".   alt='Finance Article Image' style=\"height:200px;\"/>" ;			   
                ?> 
		<br/>		
		<br/>
		<p><a style="color: #C33636;font-size:18px;" href="FinanceAdmin.php">Back to List</a></p>
		</div>
	</div>
 </div>
</div> 
</body>
</html>