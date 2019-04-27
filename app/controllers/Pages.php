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

    }

    public function index()
    {
        if (isLoggedIn()) {
            redirect('posts');
        }
// PASSING DATA
        $data = [
            'title' => 'Shareposts',
            'description' => 'Simple social network build on custom MVC PHP framework'
        ];

        $this->view('pages/index', $data);
    }

    public function about()
    {

        $data = [
            'title' => 'About Us',
            'description' => 'App to share posts with user auth'
        ];
        $this->view('pages/about', $data);
    }
}