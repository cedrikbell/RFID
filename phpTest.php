<?php echo "Hello World!" ?>

<!-- localhost/root/toor-->
<?php 

echo "<table style='border: solid 1px black;'>";
echo "<tr><th>testName</th><th>Location</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 
	$servername = "localhost";
	$username = "root"; //unique to you
	$password = "toor";//unique to you
	$database = "test"; //unique to you
try{
	$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	//
	$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Connected Successfully";
	
	/*$sql1 = "INSERT INTO t1(testName,Location)
VALUES('insertN1','inAOne')";
	$conn->exec($sql1);
		echo "Inserted Successfully!"; */
		
	/*$sqlU = "UPDATE t1 SET testName = 'updatedA' WHERE Location = 5";
	$stmt = $conn->prepare($sqlU);
	$stmt->execute(); */
	
	/*$sqlD = "UPDATE t1 SET testName = '$tName' WHERE Location = 5";
	$stmt = $conn->prepare($sqlU);
	$stmt->execute(); */
	
	
	
	/*$sql2= "select * from t1";//this doesn't display any results other than the echo 
	//$conn->exec($sql2);
		echo "Retrieved Successfully!"; */
	$stmt = $conn->prepare("select * from t1");
	$stmt->execute();
	
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }

}
catch(PDOException $e)
{
//echo "Connection failed: " . $e->getMessage();

echo $sql1 . "<br>" . $e->getMessage();

}		

$conn = null;
echo "</table>";
?>
