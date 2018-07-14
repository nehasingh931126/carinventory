<?php 

Class Model {
	private $db;
	private $mysqli;
	private $query;
    private static $_instance; //The single instance
    public static function getInstance() {
        if(!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct(){
		$this->db = Database::getInstance();
    	$this->mysqli = $this->db->getConnection();
    }
    
    public function createModelRecord($data,$files)  {
        $file_upload_one = !empty($files[0]) ? $files[0] : null;
        $file_upload_second = !empty($files[1]) ? $files[1] : null;
    	$this->query = "Insert into model(model_name,manufacturer_name,file_upload_one
                        ,file_upload_second,color,manufacturing_year,registration_number,notes,
                        model_count) 
                        VALUES('".$data['model_name']."', '".$data['manufacturer_name']."', 
                            '".$file_upload_one."', '".$file_upload_second."',
                            '".$data['color']."', '".$data['manufacturing_year']."',
                            '".$data['registration_number']."', '".$data['notes']."',
                            '".$data['model_count']."'
                        )";
        $result = $this->mysqli->query($this->query);
    	if($result){
    		return "Data Saved Successfully"; 
    	}else{
    		return "Something went wrong";
    	}
    }

    public function listModelRecords($id= NULL)  {
        $whereClause  = !empty($id) ? 'where md.id = '.$id : '';
    	$this->query = "Select md.id,md.model_name,mf.manufacturer_name,md.manufacturing_year,md.registration_number,md.model_count,md.file_upload_one,md.file_upload_second FROM model md LEFT JOIN manufacturer mf ON md.manufacturer_name = mf.id $whereClause order by md.id desc";
        $result = $this->mysqli->query($this->query);
        $row=mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $row;
    }

    public function deleteById($id){
        $this->query = "Select model_count from model where id = ".$id;
        $result = $this->mysqli->query($this->query);
        $row=mysqli_fetch_all($result,MYSQLI_ASSOC);
        $count = (int)reset($row)['model_count'];
        if($count >1){
            $count = $count-1;
            $this->query= "Update model set model_count= $count where id = $id";
            $result = $this->mysqli->query($this->query);
            return $return = ($result == true) ? "$count More Model Left to be sold": "Something went wrong";
        }else{
            $this->query= "Delete from model where id = $id";
            $result = $this->mysqli->query($this->query);
            return $return = ($result == true) ? "All Models Sold Out": "Something went wrong";
        }

    }
}
?>