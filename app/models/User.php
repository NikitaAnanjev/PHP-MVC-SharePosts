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

//     Find user by email
    public function findUserByEmail($email)
    {
//   Calling from the DB library query "Prepared Statement with query" -> libraries/Database.php
        $this->db->query('SELECT * FROM users WHERE email = :email');
//        Bind value tot the email-> [parsing email from the controller
        $this->db->bind(':email',$email);
        $row = $this->db->single();

//        Check row
//        @Database.php rowCount();
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }

    }
}