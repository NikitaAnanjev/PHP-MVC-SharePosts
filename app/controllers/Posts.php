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
//            redirect('users/login');
        }
        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
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

    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize POST array first

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'image' => trim($_POST['image']),
                'title_err' => '',
                'body_err' => '',
            ];

            // Validate data
            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }
            if (empty($data['body'])) {
                $data['body_err'] = 'Please enter body text';
            }
            if (empty($data['image'])) {
                $data['image_err'] = 'Please enter Image name';
            }

            // Make sure no errors
            if (empty($data['title_err']) && empty($data['body_err']) && empty($data['image_err']) ) {
                // Validated
                if ($this->postModel->addPost($data)) {
                    flash('post_message', 'Post Added');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('posts/add', $data);
            }

        } else {
            $data = [
                'title' => '',
                'body' => '',
                'image' => ''
            ];
        }
        $this->view('posts/add', $data);
    }

    // Edit post
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize POST array first
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'image' =>  trim($_POST['image']),
                'title_err' => '',
                'body_err' => '',
                'image_err' => '',
            ];

            // Validate data
            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }
            if (empty($data['body'])) {
                $data['body_err'] = 'Please enter body text';
            }
            if (empty($data['image'])) {
                $data['image_err'] = 'Please enter image name';
            }

            // Make sure no errors
            if (empty($data['title_err']) && empty($data['body_err']) && empty($data['image_err'])) {
                // Validated
                if ($this->postModel->updatePost($data)) {
                    flash('post_message', 'Post Updated');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('posts/edit', $data);
            }

        } else {
            //  Get existing post from mdoel
            $post = $this->postModel->getPostById($id);
            // Check for owner
            if ($post->user_id != $_SESSION['user_id']) {
                redirect('posts');
            }

            $data = [
                'id' => $id,
                'title' => $post->title,
                'body' => $post->body,
                'image' => $post->image
            ];
        }
        $this->view('posts/edit', $data);
    }

    // Show posts
    public function show($id)
    {
        $post = $this->postModel->getPostById($id);
        $user = $this->userModel->getUserById($post->user_id);

        $data = [
            'post' => $post,
            'user' => $user
        ];

        $this->view('posts/show', $data);
    }

        //  DELETE
    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //  Get existing post from mdoel
            $post = $this->postModel->getPostById($id);
            // Check for owner
            if ($post->user_id != $_SESSION['user_id']) {
                redirect('posts');
            }
            if ($this->postModel->deletePost($id)) {
                flash('post_message', 'Post Removed');
                redirect('posts');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('posts');
        }
    }
}