<?php 
	include 'RfidController.php';
	//include_once 'Make.php';
	
	$rC = new RfidController();
	$rC->printHTMLHEADER();
	$rfid = $rC->getNewrfid();	
	$rfid->generateSelectrfidForm();
	$rC->printHTMLFOOTER();
	
?>