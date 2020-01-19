<?php

class User {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // create user
    public function createUser($data)
    {
        if($data['password'] == $data['c_password']) {
            $this->db->query("
            INSERT INTO users (name, username, password, email)
            VALUES (:name, :username, :password, :email)
        ");

            // Bind Data
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':email', $data['email']);

            // executed
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }
    // edit user

    // delete user

    // get all users
    public function getAllUsers()
    {
        $this->db->query("
            SELECT * FROM users
        ");

        return $this->db->resultSet();
    }

    // get logged in user
    public function getCurrentUser($id)
    {
        $this->db->query("
            SELECT * FROM users WHERE id = :id
        ");

        $this->db->bind(':id', $id);

        return $this->db->resultSet();
    }

    // check user login user/password
    public function checkLogin($username, $password)
    {
        $this->db->query("
            SELECT id FROM users WHERE username = :username AND password = :password
        ");

        // verify password

        // bind
        $this->db->bind(':username', $username);
        $this->db->bind(':password', $password);

        // executed
        return $this->db->single();
    }

    // logout user
    public function logout($user_id)
    {
        unset($_SESSION['username']);
        unset($_SESSION['user_id']);
    }
}