<?php 
    require_once "database.class.php";

    class Units{
        private $conn;
        public $unit_id;
        public $u_title;
        public $u_description;
        public $u_functions;
        
        function __construct(){
            $db = new Database;
            $this->conn = $db->connect();
        }

        function addUnit(){
            $sql = "INSERT INTO units (u_title, u_description, u_functions) VALUES (:u_title, :u_description, :u_functions)";
            $query = $this->conn->prepare($sql);
            $query->bindParam('u_title', $this->u_title);
            $query->bindParam('u_description', $this->u_description);
            $query->bindParam('u_functions', $this->u_functions);

            if($query->execute()){
                return true;
            }else {
                return false;
            }
        }

        function showAllUnits(){
            $sql = "SELECT * FROM units"; 
            $query = $this->conn->prepare($sql);

            $query->execute();
            return $query->fetchAll();
        }
        
        function showUnit($unit_id){
            $sql = "SELECT * FROM units WHERE unit_id = :unit_id";
            $query = $this->conn->prepare($sql);
            $query->bindParam(":unit_id", $unit_id);

            $query->execute();
            return $query->fetch();
        }

        function getUnit($unit_id){
            $sql = "SELECT unit_id FROM units WHERE unit_id = :unit_id";
            $query = $this->conn->prepare($sql);
            $query->bindParam(":unit_id", $unit_id);
            $query->execute();
            return $query->fetch();
        }
    }
?>