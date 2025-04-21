<?php 
    require_once "database.class.php";

    class Announcements{
        private $conn;

        public $announcement_id;
        public $a_title	;
        public $a_description;
        public $a_date;


        function __construct(){
            $db = new Database;
            $this->conn = $db->connect();
        }
        function addAnnouncement(){
            $sql = "INSERT INTO announcements (a_title, a_description, a_date) VALUES (:a_title, :a_description, :a_date)";
            $query = $this->conn->prepare($sql);
            $query->bindParam(':a_title', $this->a_title	);
            $query->bindParam(':a_description', $this->a_description);
            $query->bindParam(':a_date', $this->a_date);

            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        }

        function announcement_id($announcement_id){
            $sql = "SELECT announcement_id FROM announcements WHERE announcement_id = :announcement_id";
            $query = $this->conn->prepare($sql);
            $query->bindParam(":announcement_id", $announcement_id);
            $query->execute();
            return $query->fetchColumn();
        }

        function call_announcements(){
            $sql = "SELECT * FROM announcements ORDER BY a_date DESC";
            $query = $this->conn->prepare($sql);

            $query->execute();
            return $query->fetchAll();
        }

        function each_announcement($announcement_id){
            $sql = "SELECT * FROM announcements WHERE announcement_id = :announcement_id";
            $query = $this->conn->prepare($sql);
            $query->bindParam(":announcement_id", $announcement_id);


            $query->execute();
            return $query->fetch();
        }

    }
?>