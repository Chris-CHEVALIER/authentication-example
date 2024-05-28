<?php

class UsersManager
{
    private PDO $db;

    public function __construct()
    {
        $dbName = "authentication_example";
        $port = 3306;
        $userName = "root";
        $password = "root";
        try {
            $this->setDb(new PDO("mysql:host=localhost;dbname=$dbName;port=$port;charset=utf8mb4", $userName, $password));
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function setDb(PDO $db): self
    {
        $this->db = $db;
        return $this;
    }

    public function create(User $newUser): void
    {
        $req = $this->db->prepare("INSERT INTO `user` (firstName, lastName, email, password) VALUES (:firstName, :lastName, :email, :password)");

        $req->bindValue(":firstName", $newUser->getFirstName(), PDO::PARAM_STR);
        $req->bindValue(":lastName", $newUser->getLastName(), PDO::PARAM_STR);
        $req->bindValue(":email", $newUser->getEmail(), PDO::PARAM_STR);
        $req->bindValue(":password", $newUser->getPassword(), PDO::PARAM_STR);

        $req->execute();
    }

    public function readByEmail(string $email): User
    {
        $req = $this->db->prepare("SELECT * FROM user WHERE email = :email");
        $req->bindValue(":email", $email, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetch();
        return new User($data);
    }
}
