<?php 
	include 'RfidController.php';

	$modelName = $_POST['modelName'];	
	$rC = new RfidController();
	//$nM = Make($makes);
	$rC->selectModel($modelName);
?>