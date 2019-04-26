<?php
/**
 * Created by PhpStorm.
 * User: Nikita A
 * Date: 26/04/2019
 * Time: 21:19
 */

class Posts extends Controller
{

    public function __construct()
    {
        //  If we are not logedIn
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $this->postModel = $this->model('Post');
    }

    public function index()
    {
// GET POST
        $posts = $this->postModel->getPosts();

        $data = [
            'posts' => $posts
        ];
        $this->view('posts/index', $data);
    }


}