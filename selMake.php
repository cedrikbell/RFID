<?php 
	include 'RfidController.php';

	$makeName = $_POST['makeName'];	
	$rC = new RfidController();
	//$nM = Make($makes);
	$rC->selectMake($makeName);
?>