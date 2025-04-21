<?php
    require_once "database.class.php";

    class Inquire{
        private $conn;
        public $inquire_id;
        public $firstname;
        public $lastname;
        public $email;
        public $message;
        public $date;
        
        function __construct(){
            $db = new Database;
            $this->conn = $db->connect();
        }

        function newInquiries(){
            $sql = "INSERT INTO inquire (firstname, lastname, email, message, date) VALUES (:firstname, :lastname, :email, :message, :date); ";

            $query = $this->conn->prepare($sql);
            $query->bindParam(":firstname", $this->firstname);
            $query->bindParam(":lastname", $this->lastname);
            $query->bindParam(":email", $this->email);
            $query->bindParam(":message", $this->message);
            $query->bindParam(":date", $this->date);

            if ($query->execute()){
                return true;
            }else{
                return false;
            }
        }

        function call_inquiries() {
            $sql = "SELECT * FROM inquire ORDER BY STR_TO_DATE(date, '%M %d, %Y') DESC;";
            $query = $this->conn->prepare($sql);
        
            $query->execute();
            return $query->fetchAll();
        }
        
 
    }

?>