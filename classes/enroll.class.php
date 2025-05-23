<?php 
    require_once "database.class.php";
    require_once "unit.class.php";


    class Enroll{
        private $conn;
        public $unit_id;
        public $e_steps;

        function __construct(){
            $db = new Database;
            $this->conn = $db->connect();
        }

    
        function join() {
            $sql = "SELECT enroll.*, units.* FROM enroll INNER JOIN units ON enroll.unit_id = units.unit_id WHERE enroll.unit_id = :unit_id"; 
            $query = $this->conn->prepare($sql);

            $query->bindParam(':unit_id', $this->unit_id);

            $query->execute();
        
            return $query->fetch(); 
        }

        function addSteps() {
            $sql = "INSERT INTO enroll (unit_id, e_steps) VALUES (:unit_id, :e_steps)";
            $query = $this->conn->prepare($sql);
        
            foreach ($this->e_steps as $e_step) {
                $query->bindParam(':unit_id', $this->unit_id);
                $query->bindParam(':e_steps', $e_step);
                $query->execute();
            }
        
            return true;
        }

        function showSteps($unit_id){
            $sql = "SELECT * from enroll WHERE unit_id = :unit_id";
            $query = $this->conn->prepare($sql);

            $query->bindParam(':unit_id', $unit_id);

            $query->execute();  
            return $query->fetchAll();

        }
        function deleteEnroll($unit_id, $steps) {
            $sqlDelete = "DELETE FROM enroll WHERE unit_id = :unit_id";
            $queryDel = $this->conn->prepare($sqlDelete);
            $queryDel->bindParam(':unit_id', $unit_id);
            $queryDel->execute();
        
            // Then insert the new steps
            $sqlInsert = "INSERT INTO enroll (unit_id, e_steps) VALUES (:unit_id, :e_steps)";
            $query = $this->conn->prepare($sqlInsert);
        
            foreach ($steps as $step) {
                $query->bindParam(':unit_id', $unit_id);
                $query->bindParam(':e_steps', $step);
                $query->execute();
            }
        
            return true;
        }

        function updateSteps($unit_id, $steps) {
            // First delete all old steps
            $sqlDelete = "DELETE FROM enroll WHERE unit_id = :unit_id";
            $queryDel = $this->conn->prepare($sqlDelete);
            $queryDel->bindParam(':unit_id', $unit_id);
            $queryDel->execute();
        
            // Then insert the new steps
            $sqlInsert = "INSERT INTO enroll (unit_id, e_steps) VALUES (:unit_id, :e_steps)";
            $query = $this->conn->prepare($sqlInsert);
        
            foreach ($steps as $step) {
                $query->bindParam(':unit_id', $unit_id);
                $query->bindParam(':e_steps', $step);
                $query->execute();
            }
        
            return true;
        }
        
        
        
    }


?>