<?php 
	include 'RfidController.php';
	//include_once 'Make.php';
	
	$rC = new RfidController();
	$rC->printHTMLHEADER();
	$make = $rC->getNewMake();
	$make->generateNewMakeForm();
	$make->generateSelectMakeForm();
	$make->generateUpdateMakeForm();
	$make->generateDeleteMakeForm();
	$rC->printHTMLFOOTER();
	
?>