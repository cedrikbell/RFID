<?php
class insertNom implements NomDAO
{

	    public function selectNomenclature($categoryName){
        $servername = "localhost";
		$username = "root";
		$password = "sqldba";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);
        $result = $conn->query("SELECT $categoryName FROM nomenclature");
        $articles = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = $row;
        }
        $result->closeCursor();
        return $articles;
    }
   	public function insertNomenclature($categoryName){
		//$conn = connect();
		$servername = "localhost";
		$username = "root";
		$password = "sqldba";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		$sql = "INSERT into nomenclature(make_id, makeName, created_at, updated_at) VALUE(MAX(categoryID)+1, $categoryName,CURDATE(),CURDATE())";
		$conn->query($sql);
		echo "Success";
    }
}