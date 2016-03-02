<?php
class insertNom implements NomDAO
{
	public function selectNomenclature($categoryName){
		$servername = "localhost";
		$username = "root";
		$password = "sqldba";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT $categoryName FROM nomenclature";
		$conn->query($sql);
		$articles = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = $row;
        }
        $result->closeCursor();
        return $articles;
		echo "Success";

	}

	public function insertNomenclature($nomName){
		//$conn = connect();
		$servername = "localhost";
		$username = "root";
		$password = "sqldba";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		$sql = "INSERT into nomenclature(make_id, makeName, created_at, updated_at) VALUE(:make_id, :makeName, :created_at, :updated_at";
		$conn->query($sql);
		echo "Success";
	}
}