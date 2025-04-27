<?php 
    require_once "database.class.php"; 


    class Course{
        private $conn; 

        public $course_id;
        public $unit_id;  
        public $c_title;
        public $c_desc;
        
        
        function __construct(){
            $db = new Database;
            $this->conn = $db->connect();
    }
    function join() {
        $sql = "SELECT course.*, units.* FROM course INNER JOIN units ON course.unit_id = units.unit_id WHERE course.unit_id = :unit_id"; 
        $query = $this->conn->prepare($sql);

        $query->bindParam(':unit_id', $this->unit_id);

        $query->execute();
    
        return $query->fetch(); 
    }

    function addCourse() {
        $sql = "INSERT INTO course (unit_id, c_title, c_desc) VALUES (:unit_id, :c_title, :c_desc)";
        $query = $this->conn->prepare($sql);
    
            $query->bindParam(':unit_id', $this->unit_id);
            $query->bindParam(':c_title', $this->c_title);
            $query->bindParam(':c_desc', $this->c_desc);

             if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        }

    function showCourse($unit_id){
        $sql = "SELECT * from course WHERE unit_id = :unit_id";
        $query = $this->conn->prepare($sql);
        $query->bindParam(":unit_id", $unit_id);
        
        $query->execute();
        return $query->fetchAll();

    }

    function delete_course($course_id) {
        $sql = "DELETE FROM course WHERE course_id = :course_id";
        $query = $this->conn->prepare($sql);
        $query->bindParam(':course_id', $course_id);
    
        return $query->execute();
    }
    function editCourse() {
        $sql = "UPDATE course SET c_title = :c_title, c_desc = :c_desc WHERE course_id = :course_id";
        $query = $this->conn->prepare($sql);
    
        $query->bindParam(':c_title', $this->c_title);
        $query->bindParam(':c_desc', $this->c_desc);
        $query->bindParam(':course_id', $this->course_id);
    
        return $query->execute();
    }
    
}
?>