<?php

class Database{

	//properties
	private static $user = 'novacorp_adampr';
	private static $pass = '73y1z9sXeRXM';
	private static $db = 'novacorp_webproj';
	private static $dsn = 'mysql:host=localhost;dbname=novacorp_webproj';
	private static $dbcon;


	private function __construct(){

	}


	// get PDO connection (a method) to call it dbcon::getDb();
	public static function getDb(){
		if(!isset(self::$dbcon)){
			try{
				self::$dbcon = new PDO(self::$dsn, self::$user, self::$pass);
				self::$dbcon-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e){
				$msg = $e->getMessage();
				include 'customerror.php';
				//echo "no connection";
				exit();
			}
		}
		return self::$dbcon;	
	}
}
?>