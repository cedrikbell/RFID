<?php 
	include 'RfidController.php';
	$rfid = $_POST['rfid'];
	$serial = $_POST['serial'];
	$rC = new RfidController();
	//$nM = Make($makes);
	$rC->selectRFID($rfid, $serial);
?>