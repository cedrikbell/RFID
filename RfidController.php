<?php
include 'Make.php';
include 'header.php';
class RfidController
 {
 	public function connect(){
		$servername = "localhost";
		$username = "root";
		$password = "toor";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
	}
	public function printHTMLHeader(){
		$newHeader = new Header;
		$newHeader->printHTMLHeader();
		//header.php;
		/*print("<!doctype html> <html lang=en> <head>
		<meta charset=UTF-8>
		<title>EECS AMS</title>
		<meta name=viewport content=width=device-width, initial-scale=1>
		<link rel=stylesheet href=navMenu.css>		
		</head>
		");*/
		
	}
	public function printHTMLFooter(){
		//print("</body></html>");
		//echo"Footer";
	}
	
	public function getNewMake(){
		return new Make;
	}

	
	public function insertMake($makeName){
		//$conn = connect();
		$servername = "localhost";
		$username = "root";
		$password = "toor";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		$sql = "INSERT into makes('makeName') VALUE($makeName)";
		$conn->query($sql);
		echo "Success";
	}
	public function insertModel($inModel){
		echo "Not inModel not set";
	}	
 };
 ?>
