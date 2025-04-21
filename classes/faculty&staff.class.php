<?php 
    require_once "database.class.php";

    class FacultyStaff{
        private $conn;
        public $facultystaff_id;
        public $firstname;
        public $middleinitial;
        public $lastname;
        public $role;

        function __construct(){
            $db = new Database;
            $this->conn = $db->connect();
        }

        function addFacultyStaff(){
            $sql = "INSERT INTO facultystaff (firstname, middleinitial, lastname, role ) VALUE (:firstname, :middleinitial, :lastname, :role)";
            $query = $this->conn->prepare($sql);
            $query->bindParam(":firstname", $this->firstname);
            $query->bindParam(":middleinitial", $this->middleinitial);
            $query->bindParam(":lastname", $this->lastname);
            $query->bindParam(":role", $this->role);

            if ($query->execute()){
                return true;
            }else{
                return false;
            }
        }
        function showFacultyStaff(){
            $sql = "SELECT * FROM facultystaff";
            $query = $this->conn->prepare($sql);

            $query->execute();
            return $query->fetchAll();
        }
    }
    

?>