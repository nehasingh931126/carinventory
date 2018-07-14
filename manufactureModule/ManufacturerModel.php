<?php 
error_reporting(-1);
require '../DatabaseConnection.php';
Class Manufacturer{
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
    
    public function createManufacturerRecord($data){
    	$this->query = "Insert into manufacturer(manufacturer_name) VALUES('".$data['manufacturer_name']."')";
        $result = $this->mysqli->query($this->query);
    	if($result){
    		return "Data Saved Successfully"; 
    	}else{
    		return "Something went wrong";
    	}
    }

    public function getManufacturerRecord(){
        $this->query = "Select id, manufacturer_name from manufacturer";
        $result = $this->mysqli->query($this->query);
        $row=mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $row;
    }
}
?>