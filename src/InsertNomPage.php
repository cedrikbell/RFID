<?php 
	include 'RfidController.php';
	//include_once 'Make.php';
	
	$rC = new RfidController();
	$rC->printHTMLHEADER();
	$nom = $rC->getNewNomenclature();
	$nom->generateNewNomForm();
	$nom->generateSelectNomForm();
	$nom->generateUpdateNomForm();
	$nom->generateDeleteNomForm();
	$rC->printHTMLFOOTER();
	
?>