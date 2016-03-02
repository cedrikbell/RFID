<?php
require_once "C:\wamp\bin\php\php5.5.12\NewMakeDAO.php";
require_once "C:\wamp\bin\php\php5.5.12\Newinsertmake.php";

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
        $dataSet->addTable('makes', dirname(__FILE__)."\makes_Stale.csv");
        return $dataSet;
    }

    public function testInsertMakes() {
        $dataSet = new PHPUnit_Extensions_Database_DataSet_CsvDataSet();
        $make = new insertmake();
        $newMake = $make->insertsMake(array(
            "make_id" => "164",
            "makeName" => "Lorem",
            "created_at" => "2011-04-06 10:0:00",
            "updated_at" => "2011-04-06 10:02:00"));
        $newMake = (string)$newMake;
        $resultingTable = $this->getConnection()
            ->createQueryTable("makes",
            "SELECT * FROM makes");
        
        $expectedTable =  $this->createXmlDataSet("makestest.xml")
            ->getTable("makes");
        $this->assertTablesEqual($expectedTable, $resultingTable);   
    }
}