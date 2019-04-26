<?php
/**
 * Created by PhpStorm.
 * User: Nikita A
 * Date: 16/04/2019
 * Time: 00:25
 */

class Users extends Controller
{
    public function __construct()
    {
        //  HERE WE WILL LOAD OUR MODEL
        //  Loading users model
        $this->userModel = $this->model('User');
    }

    /**
     * Register Form Data
     */
    public function register()
    {
        //LOADING OUR FORM WHEN we go to the register page
        //Submitting register form
        //CHECK FOR POST, SERVER superglobal
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init data register form
//            In case of the error and if we want to save input data in the form input field we need to pass POST[''] back to te form
//            seee below
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            //  Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
                //  Check email
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'This Email is already taken';
                }
            }

            //  Validate Name
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }
            //  Password Name
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Please must be at least 6 characters';
            }
            //  Password Name
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } else {// confirm passwords validation
                if ($data['password'] != $data['confirm_password']) {

                    $data['confirm_password_err'] = 'Passwords do not mutch';
                }
            }
            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                // Validated

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if ($this->userModel->register($data)) {
                    //   helpers/session_helper.php -> Bootstrap.php -> here -> views/users/login/php (show)
                    flash('register_success', 'You are registered and can log in');
                    redirect('users/login');
                } else {
                    die('Something went wrong');
                }

            } else {
                // Load view with errors
                $this->view('users/register', $data);
            }

        } else {
            //   Init data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

//           LOAD view
            $this->view('users/register', $data);
        }
    }

    /**
     * Login Form Data
     */
    public function login()
    {
        //  CHECK FOR POST, SERVER superglobal
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //            Init data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];


            // Email Validation
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }
            // password Name
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Please must be at least 6 characters';
            }
            // Check for user/email
            if ($this->userModel->findUserByEmail($data['email'])) {
                //user found
            } else {
                $data['email_err'] = 'No user found';
            }


            // Make sure errors are empty
            if(empty($data['email_err']) && empty($data['password_err'])){
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if($loggedInUser){
                    // Create Session
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Password incorrect';

                    $this->view('users/login', $data);
                }
            } else {
                // Load view with errors
                $this->view('users/login', $data);
            }


        } else {
            // Init data
            $data =[
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            //  LOAD view
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        redirect('posts');
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }


}