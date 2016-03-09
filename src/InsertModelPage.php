<?php 
	include 'RfidController.php';
	//include_once 'Make.php';
	
	$rC = new RfidController();
	$rC->printHTMLHEADER();
	$model = $rC->getNewModel();
	$model->generateNewModelForm();
	$model->generateSelectModelForm();
	$model->generateUpdateModelForm();
	$model->generateDeleteModelForm();
	$rC->printHTMLFOOTER();
	
?>