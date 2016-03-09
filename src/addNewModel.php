<?php 
	include 'RfidController.php';

	$modelName = $_POST['modelName'];	
	$makeName = $_POST['makeName'];
	$nomName = $_POST['nomName'];
	$rC = new RfidController();
	//$nM = Make($makes);
	$rC->insertModel($modelName,$makeName,$nomName);
?>