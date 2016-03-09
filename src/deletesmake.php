<?php
class deleteMake implements DeleteMakeDAO
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
   public function deletesMake($inMake){//not functional until we add the delete fields to the tables 
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
        $sql = "UPDATE `makes` SET `delete` = '1', `updated_at` = CURDATE() WHERE makeName = '$inMake'";
        $result = $conn->query($sql);
        //$result = mysql_query($conn,$sql);
        echo "Success";
    }  
} 