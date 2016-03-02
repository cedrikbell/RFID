<?php
class insertModel implements ModelDAO
{
public function selectModel($inModel){
        $servername = "localhost";
        $username = "root";
        $password = "sqldba";
        $dbname = "rfid_database";
        $conn = new mysqli($servername,$username,$password,$dbname);
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
public function insertModel($modelName =''){
        $servername = "localhost";
        $username = "root";
        $password = "sqldba";
        $dbname = "rfid_database";
        $conn = new mysqli($servername,$username,$password,$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = ("INSERT into model(model_id, model_Name, make_id, nom_id, created_at, updated_at, photo_file_name, photo_content_type, photo_file_size, photo_updated_at, seriveLife, maintainence_type) VALUE(:model_id, :model_Name, :make_id, :nom_id, :created_at, :updated_at, :photo_file_name, :photo_content_type, :photo_file_size, :photo_updated_at, :seriveLife, :maintainence_type");
        $conn->query($sql);
        echo "Success";
    }
}  
   