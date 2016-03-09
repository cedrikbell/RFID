<?php 
	include 'RfidController.php';
	//include_once 'Make.php';
	
	$rC = new RfidController();
	$rC->printHTMLHEADER();
	$prof = $rC->getNewProf();
	$prof->generateNewProfileForm();
	$rC->printHTMLFOOTER();
	
?>