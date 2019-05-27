<?php
require_once '../../model/Database.php';
require_once '../../model/finance_news_mod.php';


if(isset($_POST['delete'])){
    $id = $_POST['id'];
    
    $db = Database::getDb();
    $delArticle = new Finance();
    $count = $delArticle->deleteArticle($id, $db);

    if($count){
        header("Location: FinanceAdmin.php");
    }
}
?>