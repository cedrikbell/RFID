<?php 
	include 'RfidController.php';

	$nomName = $_POST['nomName'];	
	$rC = new RfidController();
	$rC->updateNomenclature($nomName);
?>