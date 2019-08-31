<?php

class User
{
    private $conn;
    private $table = "users";

    public $id;
    public $firstname;
    public $lastname;


    public function __construct($db)
    {
        $this->conn = $db;
    }


    public function read()
    {

        $query = "select * from users";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }
}
