<?php
/**
 * Created by PhpStorm.
 * User: Nikita A
 * Date: 25/04/2019
 * @Class User
 */

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

//     Registration function
    public function register($data)
    {
        $this->db->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
        //    Bind Values for registration of the user
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
//  Execute Method from the libraries/database.php

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    // Login User
    public function login($email, $password){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password)){
            return $row;
        } else {
            return false;
        }
    }

    //  Find user by email
    public function findUserByEmail($email)
    {
        //   Calling from the DB library query "Prepared Statement with query" -> libraries/Database.php
        $this->db->query('SELECT * FROM users WHERE email = :email');
        //  Bind value tot the email-> [parsing email from the controller
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        //  Check row
        //        @Database.php rowCount();
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }

    }
}