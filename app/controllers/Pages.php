<?php
/**
 * Created by PhpStorm.
 * User: Nikita A
 * Date: 14/04/2019
 * Time: 12:07
 */

class Pages extends Controller
{
    public function __construct()
    {
        $this->postModel = $this->model('Post');
    }

    public function index()
    {
        if (isLoggedIn()) {
            redirect('posts');
        }
// PASSING DATA
        $posts = $this->postModel->getPosts();
        $data = [
            'title' => 'Shareposts',
            'description' => 'Simple social network build on custom MVC PHP framework',
            'posts' => $posts
        ];

        $this->view('pages/index', $data);
//        $this->view('posts/index', $data);
    }

    public function about()
    {

        $data = [
            'title' => 'About Us',
            'description' => 'App to share posts with user auth'
        ];
        $this->view('pages/about', $data);
    }


    public function cases()
    {

        $posts = $this->postModel->getPosts();
        $data = [
            'title' => 'Cases Us',
            'description' => 'App to share posts with user auth',
            'posts' => $posts
        ];
        $this->view('pages/cases', $data);
    }
}