<?php
// config/database.php
class Database {
    private $conn;
    
    public function connect() {
        $this->conn = new mysqli('localhost', 'root', '', 'socialmedia');
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        return $this->conn;
    }
}

// controller/UserController.php
class UserController {
    private $db;
    
    public function __construct() {
        $this->db = (new Database())->connect();
    }
    
    public function register($data) {
        $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $data['first_name'], $data['last_name'], $data['email'], $hashed_password);
        return $stmt->execute();
    }
    
    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if($user = $result->fetch_assoc()) {
            if(password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];
                return true;
            }
        }
        return false;
    }
}

// controller/PostController.php
class PostController {
    private $db;
    
    public function __construct() {
        $this->db = (new Database())->connect();
    }
    
    public function createPost($user_id, $content) {
        $stmt = $this->db->prepare("INSERT INTO posts (user_id, content) VALUES (?, ?)");
        $stmt->bind_param("is", $user_id, $content);
        return $stmt->execute();
    }
    
    public function getPosts() {
        $result = $this->db->query("SELECT posts.*, users.first_name, users.last_name 
                                   FROM posts 
                                   JOIN users ON posts.user_id = users.user_id 
                                   ORDER BY posts.created_at DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function addComment($post_id, $user_id, $content) {
        $stmt = $this->db->prepare("INSERT INTO comments (post_id, user_id, comment) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $post_id, $user_id, $content);
        return $stmt->execute();
    }
    
    public function getComments($post_id) {
        $stmt = $this->db->prepare("SELECT comments.*, users.first_name, users.last_name 
                                   FROM comments 
                                   JOIN users ON comments.user_id = users.user_id 
                                   WHERE comments.post_id = ?");
        $stmt->bind_param("i", $post_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}

// controller/FriendController.php
class FriendController {
    private $db;
    
    public function __construct() {
        $this->db = (new Database())->connect();
    }
    
    public function sendRequest($from_user, $to_user) {
        $stmt = $this->db->prepare("INSERT INTO friends (user_id1, user_id2) VALUES (?, ?)");
        $stmt->bind_param("ii", $from_user, $to_user);
        return $stmt->execute();
    }
    
    public function getFriendRequests($user_id) {
        $stmt = $this->db->prepare("SELECT users.* FROM friends 
                                   JOIN users ON friends.user_id1 = users.user_id 
                                   WHERE friends.user_id2 = ? AND friends.status = 'pending'");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}