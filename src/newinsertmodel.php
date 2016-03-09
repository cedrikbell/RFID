<?php
class insertModel implements ModelDAO
{
public function selectModel($inModel){
        $servername = "localhost";
        $username = "root";
        $password = "sqldba";
        $dbname = "rfid_database";
        $conn = new PDO($servername,$username,$password,$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT $inModel FROM model";
        $conn->query($sql);
        $articles = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = $row;
        }
        $result->closeCursor();
        return $articles;
        echo "Success";

    }   
    public function selectMake($inMake){
        $servername = "localhost";
        $username = "root";
        $password = "sqldba";
        $dbname = "rfid_database";
        $conn = new PDO($servername,$username,$password,$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT make_id,makeName,created_at,updated_at FROM makes WHERE `delete` = '0' AND `makeName` like '$inMake%'";
        //$sql = "SELECT * from 'makes'";
        $result = $conn->query($sql);
        if(!$result){
                die("Didn't Work " . PDO_error($conn));
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
        public function selectNomenclature($inCategory){
        $servername = "localhost";
        $username = "root";
        $password = "sqldba";
        $dbname = "rfid_database";
        $conn = new PDO($servername,$username,$password,$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //"SELECT model_id,model_Name, make_id,created_at,updated_at FROM models WHERE `delete` = '0' AND `model_name` like '$inModel%'";
        $sql = "SELECT nomenclature_id,nomenclature_Name,created_at,updated_at FROM nomenclature WHERE'delete' = 0 AND  `nomenclature_Name` like '$categoryName%'";
        $result = $conn->query($sql);
        if(!$result){
                die("Didn't Work " . PDO_error($conn));
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
public function insertsModel($inModel,$inMake,$inCategory){//doesn't handle photos now
        $servername = "localhost";
        $username = "root";
        $password = "sqldba";
        $dbname = "rfid_database";
        $conn = new PDO($servername,$username,$password,$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO `models` (`model_Name`,`make_id`,`nom_id`,`created_at`, `updated_at`) VALUES ($inModel,(SELECT make_id FROM makes WHERE makeName = '$inMake'),(SELECT nomenclature_id FROM nomenclature WHERE nomenclature_Name = '$inCategory') ,CURDATE(),CURDATE())";
        $result = $conn->query($sql);
        if(!$result){
                die("Didn't Work " . PDO_error($conn));
        }
        else echo "Success";
    }   
}  
   