<?php
require_once '../../model/Database.php';
require_once '../../model/finance_news_mod.php';
require_once '../../views/admin-header.php';

$titleErr = "";
$categoryErr ="";
$authorErr ="";
$contentErr ="";
$dateErr ="";
$image_titleErr ="";
$imageErr ="";
$isValid = true;

if(isset($_POST['update'])){
	  $id = $_POST['id'];
	  $db = Database::getDb();
      $fns = new Finance();
      $count = $fns->getArticleById($id, $db);
}
 if(isset($_POST['updateArt'])){
	  
        $id = $_POST['fid'];
		$title = $_POST['title'];
		$category = $_POST['category'];
		$author = $_POST['author'];
		$content = $_POST['content'];
		$date = $_POST['date'];
		
		$image_title = $_POST['image_title'];
		$image_title = str_replace( ' ', '-', $image_title);
		$image_title = preg_replace('/[^0-9a-zA-Z_]/', '', $image_title);
		$image = $_FILES['image'];
		$extension = explode('.', $_FILES['image']['name']);
		$extension = array_pop($extension);
		$image = strtolower(time().'-'. $image_title.'.'.$extension);
		move_uploaded_file(
			$_FILES['image']['tmp_name'],
			__DIR__.'/images/'.$image
		);
		
	

            $db = Database::getDb();
            $fns = new Finance();
            $count = $fns->updateArticle($id, $title, $category, $author, 
                $content, $date,$image_title,$image,$db);

            if($count){
                header("Location: FinanceAdmin.php");
                
            }
             else {
        echo  "problem updating";
    }
        
 }
	 
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
                                        <li ><a href="../../views/sport/sport-admin.php" class="admin-menu-active">News</a></li>
                                    </ul>
                                </li>
                                <li><a href="../../views/finance_news/FinanceAdmin.php">Economics</a></li>
                                <li><a href="../../views/crypto/crypto-admin.php">Crypto</a></li>
								<li><a href="../../views/contact/messages.php">Messages</a></li>
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
		   <h3><a href="../../views/finance_news/add_article.php" style="color: #C33636;">EDIT ARTICLE</a></h3>
          <form action="" method="post" id="financeUpdate" enctype="multipart/form-data">  
            <input type="hidden" name="fid" value="<?= $count->id; ?>" />
            <div id="fin_edit_title">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="<?=$count->title; ?>" class="form-control" /><br/>
            </div>
            <div id="edit_category">
			<label for="category">Category:</label>
			<select id="category" name="category"  class="form-control">
			<option value="Default" <?php if($count->category == 'default') echo "selected"; ?> >Default</option>
			  <option value="Banking" <?php if($count->category == 'banking') echo "selected"; ?> >Banking</option>
			  <option value="Insurance"<?php if($count->category == 'insurance') echo "selected"; ?>>Insurance</option>
			  <option value="Markets"<?php if($count->category == 'markets') echo "selected"; ?>>Markets</option>
			  <option value="Investment"<?php if($count->category == 'investment') echo "selected"; ?>>Investment</option>
			  <option value="Personal Finance"<?php if($count->category == 'personal finance') echo "selected"; ?>>Personal Finance</option>
		  </select>
		  </div>
            <div id="edit_author">
                <label for="author">Author:</label>
                <input type="text" id="author" name="author" value="<?=$count->author; ?>" class="form-control"/><br/> 
            </div>
            <div id="content">
                <label for="content">Article:</label>
				 <textarea type="text" id="content" name="content" cols="30" rows="10" required rows="12" cols="80" class="form-control"><?=$count->content; ?></textarea><br/>
            </div>
            <div id="edit_date">
                <label for="date">Date:</label>
                <input type="text" id="date" name="date" value="<?=$count->date; ?>" class="form-control"/><br/>
            </div>
			<div id="edit_image_title">
                <label for="image_title">Image Title:</label>
                <input type="text" id="image_title" name="image_title"  value="<?=$count->image_title; ?>" class="form-control"/><br/>		 
            </div>
			 <div id="edit_image">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" value="<?=$count->image; ?>" class="btn btn-default"/><br/>		 
            </div>
			
                <input type="submit" name="updateArt" value="Edit" class="btn btn-lg btn-primary" id="submit_button">
     
	
</form>
<p><a style="color: #C33636;font-size:18px;" href="FinanceAdmin.php">Back to List</a></p>
  </div>
	</div>
	</div>
</div>
</body>

</html>	
	
	