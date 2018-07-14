<?php 
error_reporting(-1);
require './ManufacturerModel.php';
if(isset($_POST) && !empty($_POST)) {
	$data = $_POST;
	$manufacturer = Manufacturer::getInstance();
	$result= $manufacturer->createManufacturerRecord($data);
	header("location:create.php?message=$result");
}

?>