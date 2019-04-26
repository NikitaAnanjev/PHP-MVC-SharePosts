<?php
/**
 * Created by PhpStorm.
 * User: Nikita A
 * Date: 26/04/2019
 * Time: 23:11
 */

class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPosts()
    {
        $this->db->query('SELECT *,
                             posts.id as postId,
                             users.id as userId,
                             posts.created_at as postCreated,
                             users.created_at as userCreated
                             FROM posts
                             Inner JOIN users
                             ON posts.user_id = users.id
                             ORDER  BY posts.created_at DESC');
        $results = $this->db->resultSet();

        return $results;
    }
}