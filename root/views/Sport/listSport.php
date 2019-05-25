<?php 
require_once '../../model/Database.php';
require_once '../../model/Sport.php';

$dbcon = Database::getDb();
$s = new Sport();

$sport_news = $s->getAllSport($dbcon);

foreach ($sport_news as $sport) {
	echo "<li>" . $sport->title . "</li>";
	echo "<li>" . $sport->category . "</li>";
	echo "<li>" . $sport->author . "</li>";
	echo "<li>" . $sport->content . "</li>";
	echo "<li>" . $sport->date . "</li>";
	echo "<li>" . $sport->image_id . "</li>";
}
 ?>