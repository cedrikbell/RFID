<?php
include 'Make.php';
include 'header.php';
include 'Model.php';
include 'Nomenclature.php';

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
	public function getNewModel(){
		return new Model;
	}
	public function getNewNomenclature(){
		return new Nomenclature;
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
		//$var = "SELECT MAX(make_id) from makes";
		//$conn->query($var);
		//$sql = "INSERT into makes(makeName) VALUE($makeName)";
		$sql = "INSERT INTO `makes`( `makeName`, `created_at`, `updated_at`) VALUES ('$makeName',CURDATE(),CURDATE())";
		$result = $conn->query($sql);
		if(!$result){
			die("Didn't Work " . mysqli_error($conn));
		}
		else echo "Success";

	}
	public function selectMake($inMake){
		$servername = "localhost";
		$username = "root";
		$password = "toor";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT make_id,makeName,created_at,updated_at FROM makes WHERE `delete` = '0' AND `makeName` like '$inMake%'";
		//$sql = "SELECT * from 'makes'";
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}
		if ($result->num_rows > 0){
			// output data of each row
   		 	while($row = $result->fetch_assoc()) {
        		echo "makeID: " . $row["make_id"]. " - makeName: " . $row["makeName"]. " Created:" . $row["created_at"]."Updated:". $row["created_at"]. "<br>";
    		}
		} 
		else {
    			echo "0 results";
		}	
		
				//$sql->execute();
		
		//look at what we did before to print stuff
		
		//$result = mysqli_query($conn,$sql);
	//	if (!$result) {
 		//	 printf("Error: %s\n", $conn->error);
 		//	 die();
	//	}
		//else { 
	//		foreach($result as $row){
		//		echo $row;		    }
		}
		
		//$result->close();
		//echo "Success";

	//}	
	/*public function updateMake($inMake){ //don't need this capability
		$servername = "localhost";
		$username = "root";
		$password = "toor";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		$sql = "UPDATE makes SET updated_at = CURDATE() WHERE makeName = $inMake";
		$conn->query($sql);
		echo "Success";
	}*/
	public function deleteMake($inMake){//not functional until we add the delete fields to the tables 
		$servername = "localhost";
		$username = "root";
		$password = "toor";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		$sql = "UPDATE `makes` SET `delete` = '1', `updated_at` = CURDATE() WHERE makeName = '$inMake'";
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}
		else echo "Success";
	}
	public function insertModel($inModel,$inMake,$inCategory){//doesn't handle photos now
		$servername = "localhost";
		$username = "root";
		$password = "toor";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		$sql = "INSERT INTO `models` (`model_Name`,`make_id`,`nom_id`,`created_at`, `updated_at`) VALUES ($inModel,(SELECT make_id FROM makes WHERE makeName = '$inMake'),(SELECT nomenclature_id FROM nomenclature WHERE nomenclature_Name = '$inCategory') ,CURDATE(),CURDATE())";
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}
		else echo "Success";
	}	
	public function selectModel($inModel){
		$servername = "localhost";
		$username = "root";
		$password = "toor";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT model_id,model_Name, make_id,created_at,updated_at FROM models WHERE `delete` = '0' AND `model_name` like '$inModel%'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			// output data of each row
   		 	while($row = $result->fetch_assoc()) {
        		echo "ModelID: " . $row["model_id"]. " - ModelName: " . $row["model_Name"]. " MakeID: ". $row["make_id"]." Created: " . $row["created_at"]." Updated: ". $row["created_at"]. "<br>";
    		}
		} 
		else {
    			echo "0 results";
		}

	}	
	//currently don't need this function either until we incorporate pictures.
	/*public function updateModel($inModel){
		$servername = "localhost";
		$username = "root";
		$password = "toor";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		$sql = "UPDATE model SET updated_at = CURDATE() WHERE modelName = $inModel";
		$conn->query($sql);
		echo "Success";
	}	*/
	public function deleteModel($inModel){// can't implement until delete fields are added to the tables. 
		$servername = "localhost";
		$username = "root";
		$password = "toor";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		//"UPDATE `makes` SET `delete` = '1', `updated_at` = CURDATE() WHERE makeName = '$inMake'";
		$sql = "UPDATE `models` SET `delete` = '1',`updated_at` = CURDATE() WHERE model_Name = '$inModel'";
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}
		else echo "Success";
	}
	public function insertNomenclature($categoryName){
		//$conn = connect();
		$servername = "localhost";
		$username = "root";
		$password = "toor";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		$sql = "INSERT INTO `nomenclature`(`nomenclature_Name`, `created_at`, `updated_at`) VALUES ('$categoryName',CURDATE(),CURDATE())";
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}
		else echo "Success";

	}
	public function selectNomenclature($categoryName){
		$servername = "localhost";
		$username = "root";
		$password = "toor";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		//"SELECT model_id,model_Name, make_id,created_at,updated_at FROM models WHERE `delete` = '0' AND `model_name` like '$inModel%'";

		$sql = "SELECT nomenclature_id,nomenclature_Name,created_at,updated_at FROM nomenclature WHERE'delete' = 0 AND  `nomenclature_Name` like '$categoryName%'";
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}

		if ($result->num_rows > 0){
			// output data of each row
   		 	while($row = $result->fetch_assoc()) {
        		echo "ID: " . $row["nomenclature_id"]. " - Name: " . $row["nomenclature_Name"]. " Created:" . $row["created_at"]."Updated:". $row["created_at"]. "<br>";
    		}
		} 
		else {
    			echo "0 results";
		}

	}
	//Since there is only one updatable field, updating is the same as deleting and making a new one.	
	public function updateNomenclature($categoryName){
		$servername = "localhost";
		$username = "root";
		$password = "toor";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		$sql = "UPDATE nomenclature SET updated_at = CURDATE() WHERE categoryName = $categoryName";
		$conn->query($sql);
		echo "Success";
	}	
	public function deleteNomenclature($catName){// can't implement until delete fields are added to the tables.
		$servername = "localhost";
		$username = "root";
		$password = "toor";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		//"UPDATE `models` SET `delete` = '1',`updated_at` = CURDATE() WHERE `model_Name` = '$inModel'";

		$sql = "UPDATE `nomenclature` SET `delete` = '1',`updated_at` = CURDATE() WHERE `nomenclature_Name` = '$catName'";
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}
		else echo "Success";

	}

	
	
	
	
	
	
	
 };
 ?>
   