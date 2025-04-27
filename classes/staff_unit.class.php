<?php 
    require_once "database.class.php";
    require_once "unit.class.php";


    class Show{
        private $conn;
        public $id;
        public $unit_id;
        public $facultystaff_id;

        function __construct(){
            $db = new Database;
            $this->conn = $db->connect();
        }

         
        function showPersonnel($unit_id){
            $sql = "SELECT facultystaff.facultystaff_id, facultystaff.firstname, facultystaff.middleinitial, facultystaff.lastname, facultystaff.role 
                    FROM unit_facultystaff uf
                    JOIN facultystaff facultystaff ON uf.facultystaff_id = facultystaff.facultystaff_id
                    WHERE uf.unit_id = :unit_id";
            
            $query = $this->conn->prepare($sql);
            $query->bindParam(':unit_id', $unit_id);
            $query->execute();  
        
            return $query->fetchAll();
        }
        
        
        
        
    }


?>