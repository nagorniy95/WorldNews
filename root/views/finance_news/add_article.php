<?php
require_once '../../model/Database.php';
require_once '../../model/finance_news_mod.php';

$titleErr = "";
$categoryErr ="";
$authorErr ="";
$contentErr ="";
$dateErr ="";
$imageErr ="";
$isValid = true;

$title = $category = $author = $content = $fin_date = $image = "";

if (isset ($_POST['addArticle'])){

	$title = $_POST['title'];
	$category = $_POST['category'];
	$author = $_POST['author'];
	$content = $_POST['content'];
	$date = $_POST['date'];
	$image = $_POST['image'];
	
	if(empty($title)){	
	$titleErr = "Please Enter the Article Title";
	$isValid = false;	
	}
	if(empty($category)){	
	$categoryErr = "Please Enter the Article Category";
	$isValid = false;	
	}
	if(empty($author)){	
	$authorErr = "Please Enter the Author Name";
	$isValid = false;	
	}
	if(empty($content)){	
	$contentErr = "Please Enter the Content";
	$isValid = false;	
	}
	if(empty($date)){	
	$dateErr = "Please Enter Date";
	$isValid = false;	
	}
	if(empty($image)){	
	$imageErr = "Please Enter  an Image";
	$isValid = false;	
	}
	
	if ($isValid === true){
		
		 $db = Database::getDb();
        $addArticle = new Finance();
        $count = $addArticle->addArticle($title, $category, $author, $content, $date, $image,$db);

        if($count){
            echo "<p class='FinanceSuccess'> New Article added <p>";
        }
    }  
}

    $db = Database::getDb();
    $f = new Finance();
    //$fin_news = $f->addArticle($title, $category, $author, $content, $date, $image, $db);
    

?>
<div class="container">
  <h3>Add New Article</h3><br/>
  
	<form action="" method="POST" id="financeForm" enctype="multipart/form-data">		
      <label for="title">Article Title:</label>
      <input type="text" id="title" name="title" placeholder="Title..." class="form-control"/><br/>
        <span id="titleErr" style="color:red;">
          <?php
              if(isset($titleErr)) {
                  echo $titleErr;
                          }
          ?>
        </span>
    </div>
    <div id="financeCategory">
      <label for="category">Category:</label>
	  <select id="category" name="category" placeholder="Category..." class="form-control">
		  <option value="Banking">Banking</option>
		  <option value="Insurance">Insurance</option>
		  <option value="Markets">Markets</option>
		  <option value="Investment">Investment</option>
		  <option value="Personal Finance">Personal Finance</option>
	 </select></br>
      
      <span id="categoryErr" style="color:red;">
          <?php
              if(isset($categoryErr)) {
                  echo $categoryErr;
                          }
          ?>
        </span>
    </div>
	
    <div id="author">
      <label for="author">Author:</label>
      <input type="text" id="author" name="author" placeholder="Author..."class="form-control" /><br/>
      <span id="authorErr" style="color:red;">
        <?php
            if(isset($authorErr)) {
                echo $authorErr;
                        }
        ?>
      </span> 
    </div>
    <div id="content">
      <label for="content">Article:</label>
      <textarea type="text" id="content" name="content" placeholder="Type..." required rows="12" cols="80" class="form-control"></textarea><br/>
      <span id="contentErr" style="color:red;">
          <?php
              if(isset($contentErr)) {
                  echo $contentErr;
                          }
          ?>
        </span> 
    </div>
	  <div id="fin_date">
      <label for="fin_date">Date:</label>
      <input type="text" id="date" name="date" placeholder="mm/dd/yy" class="form-control"/><br/>
      <span id="dateErr" style="color:red;">
          <?php
              if(isset($dateErr)) {
                  echo $dateErr;
                          }
          ?>
        </span> 
    </div>
	  <div id="image">
      <label for="image">Image:</label>
      <input type="file" name="image" id="image" class="btn btn-default">
	  <input type="Reset" name="Reset" value="Reset" class="btn btn-default" />
	  <br/>
      <span id="imageErr" style="color:red;">
          <?php
              if(isset($imageErr)) {
                  echo $imageErr;
                          }
          ?>
        </span> 
   
      <input type="submit" name="addArticle" value="Add Article" id="submit" class="btn btn-default"> 
</form>
</div>