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
        $errors = [];

        // validate username
        if(empty(trim($data['username']))) {
            return $errors['username'] = 'Please enter a username';
        } else {
            $this->db->query("SELECT username FROM users WHERE username = :username");
            // bind
            $this->db->bind(':username', $data['username']);

            // execute
            if($this->db->resultSet()) {
                $errors['username'] = 'This username is already taken!';
            } else {
                $username = trim($data['username']);
            }
        }

        // validate password
        if(empty(trim($data['password']))) {
            $errors['password'] = 'Please enter a password';
        } else if (strlen(trim($data['password'])) < 6) {
            $errors['password'] = 'Password field must be at least 6 characters long';
        } else {
            $password = trim($data['password']);
        }

        // validate confirm password
        if(empty(trim($data['c_password']))) {
            $errors['c_password'] = 'Please confirm password';
        } else {
            $confirm_password = trim($data['c_password']);
            if($password != $confirm_password) {
                $errors['password'] = 'Passwords did not match!';
            }
        }

        if(count($errors) == 0) {
            // hash password
            $password = password_hash($password, PASSWORD_DEFAULT);

            $this->db->query("
            INSERT INTO users (name, username, password, email)
            VALUES (:name, :username, :password, :email)
        ");

            // Bind Data
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':username', $username);
            $this->db->bind(':password', $password);
            $this->db->bind(':email', $data['email']);

            // executed
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        return $errors;
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
        // get current hashed password from db
        $this->db->query("
            SELECT password FROM users WHERE username = :username
        ");
        
        $this->db->bind(':username', $username);

        $hashed_password = $this->db->single()->password;

        // verify password
        if(password_verify($password, $hashed_password)) {
            $this->db->query("
                SELECT id, username FROM users WHERE username = :username
            ");

            // bind
            $this->db->bind(':username', $username);
            
            // results
            return $this->db->single();

        }

        return false;
    }

    // logout user
    public function logout($user_id)
    {
        unset($_SESSION['username']);
        unset($_SESSION['user_id']);
    }
}