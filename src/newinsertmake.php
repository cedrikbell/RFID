<?php
class insertmake implements NewMakeDAO
{
    /*
    public function getArticles($sectionId) {
        $db = new PDO(
            "mysql:host=localhost;dbname=rfid_database", 
            "root", "sqldba");
        $result = $db->query("SELECT * FROM rfid_database.makes");
        $articles = array();
        
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = $row;
        }
        $result->closeCursor();
        
        return $articles;
        */
        public function selectMake($inMake){
        $servername = "localhost";
        $username = "root";
        $password = "sqldba";
        $dbname = "rfid_database";
        $conn = new mysqli($servername,$username,$password,$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT $inMake FROM makes";
        $result = $conn->query($sql);
        $articles = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = $row;
        }
        $result->closeCursor();
        return $articles;
        echo "Success";
    }
    /*
    public function insertsMake($makeName){
        //$conn = connect();
        $servername = "localhost";
        $username = "root";
        $password = "sqldba";
        $dbname = "rfid_database";
        $conn = new mysqli($servername,$username,$password,$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //$var = "SELECT MAX(make_id) from makes";
        //$conn->query($var);
        $sql = "INSERT into makes(make_id, makeName, created_at, updated_at) value (:make_id, :makeName, :created_at, :updated_at";
        $conn->query($sql);
        //$result = mysql_query($conn,$sql);
        echo "Success";
    } 
    */
        public function insertMake($makeName){
        //$conn = connect();
        $servername = "localhost";
        $username = "root";
        $password = "sqldba";
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
}     