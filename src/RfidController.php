<?php
include 'Make.php';
include 'header.php';
include 'Model.php';
include 'Nomenclature.php';
include 'Profile.php';
include 'Footer.php';


class RfidController
 {
 	//try this first
 	//function __construct(){//this will run the contained code for every object of the class when it is instanstiated
 	//private $conn = RfidController::connect(); //this line is not valid, error from the first parenthetical when it runs outside of the constructor.
 	//how to reference variable from the constructor?
 	//}
 	//$conn = RfidController::connect(); //doesn't work without the double ::
 	// the in function version with the :: works, try the double :: as a field or instance variable. 
 	//it seems to not want instance or field variables holding the results of functions...or something like that. 
 	public function connect(){//execute to establish connectivity to the database.
		$servername = "localhost"; //default username and passwords for dev/test environments
		$username = "root";
		$password = "toor";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		return $conn;
	}
	//public $conn = $this::connect();
	
	
	public function printHTMLHeader(){//generates the Header when called
		$newHeader = new Header;
		$newHeader->printHTMLHeader();		
	}
	public function printHTMLFooter(){//generates the Footer when called
		$newFooter = new Footer;
		$newFooter->printHTMLFooter();	
	}
	//These getters are called to create objects of the classes in the xPage.php files
	public function getNewMake(){ 
		return new Make;
	}
	public function getNewModel(){
		return new Model;
	}
	public function getNewNomenclature(){
		return new Nomenclature;
	}
	public function getnewProf(){
		return new Profile;
	}
	//CRUD Sequence for Make
	public function insertMake($makeName){
		$conn = RfidController::connect();//THIS WORKS
		$sql = "INSERT INTO `makes`( `makeName`, `created_at`, `updated_at`) VALUES ('$makeName',CURDATE(),CURDATE())";
		$result = $conn->query($sql);
		if(!$result){
			die("Didn't Work " . mysqli_error($conn));//checks for properly formed query only, not input!
		}
		else echo "Success";
		$conn->close();
	}
	public function selectMake($inMake){
		$conn = RfidController::connect();
		$sql = "SELECT make_id,makeName,created_at,updated_at FROM makes WHERE `delete_Boolean` = 'NULL' AND `makeName` like '$inMake%'";
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
		$conn->close();
	}
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
		$conn = RfidController::connect();
		$sql = "UPDATE `makes` SET `delete` = '1', `updated_at` = CURDATE() WHERE makeName = '$inMake'";
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}
		else echo "Success";
		$conn->close();
	}
	//CRUD Sequence for Model
	public function insertModel($inModel,$inMake,$inCategory){//doesn't handle photos now
		$conn = RfidController::connect();
		$sql = "INSERT INTO `models` (`model_Name`,`make_id`,`nom_id`,`created_at`, `updated_at`) VALUES ($inModel,(SELECT make_id FROM makes WHERE makeName = '$inMake'),(SELECT nomenclature_id FROM nomenclature WHERE nomenclature_Name = '$inCategory') ,CURDATE(),CURDATE())";
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}
		else echo "Success";
		$conn->close();
	}	
	public function selectModel($inModel){
		$conn = RfidController::connect();
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
		$conn->close();
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
		$conn = RfidController::connect();
		$sql = "UPDATE `models` SET `delete` = '1',`updated_at` = CURDATE() WHERE model_Name = '$inModel'";
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}
		else echo "Success";
		$conn->close();
	}
	//CRUD Sequence for Nomenclature
	public function insertNomenclature($categoryName){
		$conn = RfidController::connect();
		$sql = "INSERT INTO `nomenclature`(`nomenclature_Name`, `created_at`, `updated_at`) VALUES ('$categoryName',CURDATE(),CURDATE())";
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}
		else echo "Success";
		$conn->close();
	}
	public function selectNomenclature($categoryName){
		$conn = RfidController::connect();
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
		$conn->close();
	}
	//Since there is only one updatable field, updating is the same as deleting and making a new one.	
	public function updateNomenclature($categoryName){
		$conn = RfidController::connect();
		$sql = "UPDATE nomenclature SET updated_at = CURDATE() WHERE categoryName = $categoryName";
		$conn->query($sql);
		echo "Success";
		$conn->close();
	}	
	public function deleteNomenclature($catName){// can't implement until delete fields are added to the tables.
		$conn = RfidController::connect();
		$sql = "UPDATE `nomenclature` SET `delete` = '1',`updated_at` = CURDATE() WHERE `nomenclature_Name` = '$catName'";
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}
		else echo "Success";
		$conn->close();
	}
	//CRUD Sequence for Users(Called Profile in the code)
	public function selectProfile(){
		$conn = RfidController::connect();
		$sql = "SELECT userName,lastName,firstNAme,payGrade FROM users"; //WHERE'delete' = 0 AND  `nomenclature_Name` like '$categoryName%'";
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}
		if ($result->num_rows > 0){
			// output data of each row
   		 	while($row = $result->fetch_assoc()) {
        		echo "Username: " . $row["userName"]. " - Last Name: " . $row["lastName"]. " First Name:" . $row["firstNAme"]." Grade: ". $row["payGrade"]. "<br>";
    		}
		} 
		else {
    			echo "0 results";
		}
		$conn->close();
	}
	public function insertProf($fName,$lName,$rank){//going to need to alter the users table to handle the parameters.
		$conn = RfidController::connect();
		$sql = "INSERT INTO `users`(`userName`, `lastName`,`firstNAme`, `payGrade`) VALUES ('$fName'+'.'+'$lName'+'@usma.edu' ,'$fName','$lName','$rank')"; //im assuming here that they have a usma.edu email address
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}
		else echo "Success";
		$conn->close();
	}		
	public function selectRFID($inrfid, $inSerial){
		$conn = RfidController::connect();
		$sql = "SELECT items.rfid, items.serialNum, locations.roomNumber, makes.makeName, models.model_name FROM items join locations on items.location_id=locations.location_id join models on items.model_id=models.model_id join makes on models.make_id=makes.make_id where rfid like '%$inrfid%' and serialNum like '%$inSerial%'";
		//$sql = "SELECT * from 'makes'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			echo "<table><tr><th>RFID</th><th>Serial Number</th><th>Location</th><th>Make</th><th>Model</th></tr>";
			// output data of each row
   		 	while($row = $result->fetch_assoc()) {
        		echo "<tr><td>" . $row["rfid"]. "</td><td>" . $row["serialNum"]. "</td><td>" . $row["roomNumber"]."</td><td>". $row["makeName"]."</td><td>". $row["model_name"]. "</td></tr>";
    		}
    		echo "</table>";
		} 
		else {
    		echo "0 results";
		}
		$conn->close();
	}

	
	
	
	
	
 };
 ?>
   
