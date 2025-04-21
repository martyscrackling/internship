<?php 
    require_once "database.class.php"; 


    class Course{
        private $conn; 

        public $unit_id;  
        public $c_title;
        public $c_desc;
        
        
        function __construct(){
            $db = new Database;
            $this->conn = $db->connect();
    }
    }

    

?>