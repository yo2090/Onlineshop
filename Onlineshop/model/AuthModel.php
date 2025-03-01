<?php require_once 'db/DB.php';

class AuthModel extends DB
{
    private PDO $conn;

    public function  __construct()
    {
        $this->conn = $this->connect();
    }

    public function register($fname, $lname, $email, $phone, $password): void
    {
        $sql = "INSERT INTO users (fname, lname, email, phone, password) Values (:fname, :lname, :email, :phone, :password);";

        $password = password_hash($password, PASSWORD_DEFAULT);
        $ps = $this->conn->prepare($sql);
        $ps->bindParam(':fname', $fname);
        $ps->bindParam(':lname', $lname);
        $ps->bindParam(':email', $email);
        $ps->bindParam(':phone', $phone);
        $ps->bindParam(':password', $password);
        $ps->execute();
    }

    public function getUserByEmail($email): array | bool
    {
        try {
            $sql = "SELECT * FROM users WHERE email = :email";
            $ps = $this->conn->prepare($sql);
            $ps->bindParam(':email', $email);
            $ps->execute();
            return $ps->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
