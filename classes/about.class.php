<?php 
    require_once "database.class.php";

    class About{
        private $conn;
        public $about_id;

        public $a_goals;
        public $a_objectives;
        public $a_agenda;

        function __construct(){
            $db = new Database;
            $this->conn = $db->connect();
        }
        
        function addAbout(){
            $sql = "INSERT INTO about (a_goals, a_objectives, a_agenda) VALUES (:a_goals, :a_objectives, :a_agenda)";
            $query = $this->conn->prepare($sql);
            $query->bindParam(":a_goals" , $this->a_goals);
            $query->bindParam(":a_objectives" , $this->a_objectives);
            $query->bindParam(":a_agenda" , $this->a_agenda);

            if ($query->execute()){
                return true;
            }else{
                return false;
            }
        }

        function showAbout(){
            $sql = "SELECT * FROM about";
            $query = $this->conn->prepare($sql);

            $query->execute();
            return $query->fetch();
        }
        function updateAbout(){
            $sql = "UPDATE about SET a_goals = :a_goals, a_objectives = :a_objectives, a_agenda = :a_agenda WHERE about_id = 1";
            $query = $this->conn->prepare($sql);
            $query->bindParam(":a_goals", $this->a_goals);
            $query->bindParam(":a_objectives", $this->a_objectives);
            $query->bindParam(":a_agenda", $this->a_agenda);
        
            return $query->execute();
        }
        
    }
?>