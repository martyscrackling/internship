<?php
require_once "database.class.php";

class User {
    private $conn;

    function __construct(){
        $db = new Database;
        $this->conn = $db->connect();
    }

    function add_user($firstname, $lastname, $username, $email, $password){
        $sql   = "INSERT INTO login(firstname, lastname, username,  email, password) VALUES (:firstname, :lastname, :username, :email, :password)";
        $query = $this->conn->prepare($sql);
        $query->bindParam(":firstname", $firstname);
        $query->bindParam(":lastname", $lastname);
        $query->bindParam(":username", $username);
        $query->bindParam(":email", $email);
        $hashpassword = password_hash($password, PASSWORD_DEFAULT);
        $query->bindParam(":password", $hashpassword);

        return $query->execute();
    }
    function login($username, $password) {
        try {
            $sql = "SELECT * FROM login WHERE username = :username LIMIT 1;";
            $query = $this->conn->prepare($sql);
            $query->bindParam(":username", $username);
            $query->execute();
    
            $user = $query->fetch(PDO::FETCH_ASSOC);
    
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['user_id']; 
                $_SESSION['username'] = $user['username'];
                $_SESSION['is_admin'] = $user['is_admin'];
    
                // Redirect based on is_admin value
                if ($user['is_admin'] == 1) {
                    header("Location: ../admin/admin.dashboard.php");
                    exit();
                } else {
                    header("Location: ../test/test.php");
                    exit();
                }
            } else {
                return false; // Invalid login
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
    
    function record_exist($username){
        $sql = 'SELECT COUNT(*) FROM login WHERE username = :username LIMIT 1';
        $query = $this->conn->prepare($sql);

        $query->bindParam(":username", $username);

        $query->execute();
        $count = $query->fetchColumn();

        return $count > 0;
    }
}
