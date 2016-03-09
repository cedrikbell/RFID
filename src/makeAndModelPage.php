<?php 
	include 'RfidController.php';
	//include_once 'Make.php';
	
	$rC = new RfidController();
	$rC->printHTMLHeader();
	$make = $rC->getNewMake();
	$make->generateNewMakeForm();
	$make->generateSelectMakeForm();
	//$make->generateUpdateMakeForm(); don't need to ever do this to makes
	$make->generateDeleteMakeForm();
	$model = $rC->getNewModel();
	$model->generateNewModelForm();
	$model->generateSelectModelForm();
	//$model->generateUpdateModelForm(); don't need to ever do this to models until we incorporate pictures.
	$model->generateDeleteModelForm();
	$nom = $rC->getNewNomenclature();
	$nom->generateNewNomForm();
	$nom->generateSelectNomForm();
	//$nom->generateUpdateNomForm(); don't need to ever do this
	$nom->generateDeleteNomForm();
	$rC->printHTMLFooter();
?>