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

        function showID($facultystaff_id): mixed{
            $sql = "SELECT * FROM facultystaff WHERE facultystaff_id = :facultystaff_id";
            $query = $this->conn->prepare($sql);
            $query->bindParam(":facultystaff_id", $facultystaff_id);

            $query->execute();
            return $query->fetch();
        }

        function delete_facultysfaff($facultystaff_id){
            $sql = "DELETE FROM facultystaff WHERE facultystaff_id = :facultystaff_id";
            $query = $this->conn->prepare($sql);
            $query->bindParam(':facultystaff_id', $facultystaff_id);

            if ($query->execute()){
                return true;
            }else{
                return false;
            }
        }

        function getFacultyStaff_id($facultystaff_id){
            $sql = "SELECT * FROM facultystaff WHERE facultystaff_id = :facultystaff_id";
            $query = $this->conn->prepare($sql);
            $query->bindParam(':facultystaff_id', $facultystaff_id);

            $query->execute();
            return $query->fetch();
        }
        function updateProfilePicture($facultystaff_id, $fileNameNew){
            $sql = "UPDATE facultystaff SET profile_picture = :profile_picture WHERE facultystaff_id = :facultystaff_id";
            $query = $this->conn->prepare($sql);
            $query->bindParam(':profile_picture', $fileNameNew);
            $query->bindParam(':facultystaff_id', $facultystaff_id);
            return $query->execute();
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
        function updateFaculty() {
            $sql = "UPDATE facultystaff 
                    SET firstname = :firstname, 
                        middleinitial = :middleinitial, 
                        lastname = :lastname, 
                        role = :role 
                    WHERE facultystaff_id = :facultystaff_id";
            
            $query = $this->conn->prepare($sql);
            $query->bindParam(':firstname', $this->firstname);
            $query->bindParam(':middleinitial', $this->middleinitial);
            $query->bindParam(':lastname', $this->lastname);
            $query->bindParam(':role', $this->role);
            $query->bindParam(':facultystaff_id', $this->facultystaff_id);
        
            return $query->execute();
        }


        
        
    }
    
?>