<?php 
	include 'RfidController.php';

	$nomName = $_POST['nomName'];	
	$rC = new RfidController();
	$rC->insertNomenclature($nomName);
?>