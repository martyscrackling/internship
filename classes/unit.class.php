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
            $sql = "INSERT INTO units (u_title, u_description, u_functions) 
                    VALUES (:u_title, :u_description, :u_functions)";
            
            $query = $this->conn->prepare($sql);
            $query->bindParam('u_title', $this->u_title);
            $query->bindParam('u_description', $this->u_description);
            $query->bindParam('u_functions', $this->u_functions);
        
            if($query->execute()){
                // Return the ID of the newly inserted row
                $unit_id = $this->conn->lastInsertId();
                return $unit_id;
            } else {
                return false;
            }
        }
        

        function showAllUnits(){
            $sql = "SELECT * FROM units ORDER BY unit_id DESC"; 
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

        function delete_unit($unit_id){
            $sql = "DELETE FROM units WHERE unit_id = :unit_id";
            $query = $this->conn->prepare($sql);
            
            $query->bindParam(':unit_id', $unit_id);

            if ($query->execute()){
                return true;
            }else{
                return false;
            }
        }
        function assignFacultyStaff($unit_id, $facultystaff_ids) {
            $sql = "INSERT INTO unit_facultystaff (unit_id, facultystaff_id) VALUES (:unit_id, :facultystaff_id)";
            $query = $this->conn->prepare($sql);
        
            foreach ($facultystaff_ids as $fs_id) {
                $query->bindParam(":unit_id", $unit_id);
                $query->bindParam(":facultystaff_id", $fs_id);
                $query->execute();
            }
        }
        function editUnit(){
            $sql = "UPDATE units SET u_title = :u_title, u_description = :u_description, u_functions = :u_functions WHERE unit_id = :unit_id";
            $query = $this->conn->prepare($sql);
        
            $query->bindParam(':u_title', $this->u_title);
            $query->bindParam(':u_description', $this->u_description);
            $query->bindParam(':u_functions', $this->u_functions);
            $query->bindParam(':unit_id', $this->unit_id);
        
            return $query->execute();
        }
        
        
    }
?> 