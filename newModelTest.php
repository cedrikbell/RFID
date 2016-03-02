<?php
require_once "C:\wamp\bin\php\php5.5.12\Tests\ModelDAO.php";
require_once "C:\wamp\bin\php\php5.5.12\Tests\Newinsertmodel.php";

/*
class PHPUnit_Extensions_Database_Operation_MySQL55Truncate extends PHPUnit_Extensions_Database_Operation_Truncate
{
    public function execute(PHPUnit_Extensions_Database_DB_IDatabaseConnection $connection, PHPUnit_Extensions_Database_DataSet_IDataSet $dataSet) {
        $connection->getConnection()->query("SET @PHAKE_PREV_foreign_key_checks = @@foreign_key_checks");
        $connection->getConnection()->query("SET foreign_key_checks = 0");
        parent::execute($connection, $dataSet);
        $connection->getConnection()->query("SET foreign_key_checks = @PHAKE_PREV_foreign_key_checks");
    }
}
*/
class MakesTest extends PHPUnit_Extensions_Database_TestCase
{
     public function getConnection()
    {
        $database = 'rfid_database';
        $user = 'root';
        $password = 'sqldba';
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=rfid_database', $user, $password);
        return $this->createDefaultDBConnection($pdo, $database);
    }
    /*
    public function getSetUpOperation() {
        // whether you want cascading truncates
        // set false if unsure
        $cascadeTruncates = false;
        return new PHPUnit_Extensions_Database_Operation_Composite(array(
            new PHPUnit_Extensions_Database_Operation_MySQL55Truncate($cascadeTruncates),
            PHPUnit_Extensions_Database_Operation_Factory::INSERT()
        ));
    }
    */
     protected function getDataSet() 
    {
        $dataSet = new PHPUnit_Extensions_Database_DataSet_CsvDataSet();
        $dataSet->addTable('models', dirname(__FILE__)."\models_Stale2.csv");
        return $dataSet;
    }

    public function testInsertModel() {
        $dataSet = new PHPUnit_Extensions_Database_DataSet_CsvDataSet();
        $model = new insertModel();
        $newModel = $model->insertModel(array(
            "model_id" => "5161",
            "model_Name" => "33250B",
            "make_id" => "83",
            "nom_id" => "188",
            "created_at" => "2011-04-06",
            "updated_at" => "2011-04-06",
            "photo_file_name" => "NULL",
            "photo_content_type" => "NULL",
            "photo_file_size" => "0",
            "photo_updated_at" => "NULL",
            "serviceLife" => "1",
            "maintainence_type" => "NULL"));
        $newModel = (string)$newModel;
        $resultingTable = $this->getConnection()
            ->createQueryTable("models",
            "SELECT * FROM models");
        
        $expectedTable =  $this->createXmlDataSet("modelsTest.xml")
            ->getTable("models");
        $this->assertTablesEqual($expectedTable, $resultingTable);   
    }
}