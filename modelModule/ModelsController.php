<?php

require $_SERVER['DOCUMENT_ROOT'].'/carinventory/manufactureModule/ManufacturerModel.php'; 
require './ModelsModel.php';

$model = Model::getInstance();
if(isset($_POST) && !empty($_POST) && !isset($_POST['action']) && empty($_POST['action'])  && 
	empty($_POST['valueToGetby']) && empty($_POST['idToDelete'])) {
	if(count($_FILES['file_upload']['name']) > 0){
        for($i=0; $i<count($_FILES['file_upload']['name']); $i++) {
          	$tmpFilePath = $_FILES['file_upload']['tmp_name'][$i];
			if($tmpFilePath != ""){
            	$shortname = $_FILES['file_upload']['name'][$i];
            	$filePath = "uploadedimages/" . $_FILES['file_upload']['name'][$i];
            	if(move_uploaded_file($tmpFilePath, $filePath)){
            		$files[] = $shortname; 
            	}
            }
        }
    }
    $data = $_POST;
	$result= $model->createModelRecord($data,$files);
	header("location:list.php?message=$result");
}

if(!empty($_POST) && !empty($_POST['valueToGetby']) && !empty($_POST['id'])){
	$model_by_id  =  $model->listModelRecords($_POST['id']);
	echo json_encode($model_by_id);
}

if(!empty($_POST) && !empty($_POST['action'])) {
	if($_POST['action'] == 'get_all_manfacturers_name'){
		$data = $_POST;
		$manufacturerDetails = Manufacturer::getInstance();
		$result= $manufacturerDetails->getManufacturerRecord($data);
		echo json_encode($result);	
	}
}

if(!empty($_POST) && !empty($_POST['deleteFlag']) && !empty($_POST['idToDelete'])){
	$model_by_id  =  $model->deleteById($_POST['idToDelete']);
	echo json_encode($model_by_id);
}

?>