<?php

require_once __DIR__ . '/controller.php';
require __DIR__ . '/../models/user.php';
require __DIR__ . '/../services/userService.php';

class SignupController extends Controller
{
    private $userService;
    public function __construct()
    {
        $this->userService = new UserService();
    }
    public function index()
    {
        $this->signup();

        $this->displayView($this);

    }

    public function signup()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
                $_SESSION['errorMessage'] = "All fields are required";
                header('Location: /signup');
                exit;
            } else {
                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);

                if ($this->userService->userExists($email)) {
                    $_SESSION['errorMessage'] = "User already exists";
                } elseif (!$this->userService->validatePassword($password)) {
                    $_SESSION['errorMessage'] = "Password must be between 8 and 20 characters";
                } else {
                    $user = $this->userService->create_user($name, $email, $password);
                    $this->userService->signup($user);

                    $_SESSION['successMessage'] = "You have successfully registered!\nYou can now log in.";
                    sleep(1);

                    header('Location: /login');
                    exit;
                }
                header('Refresh: 2; URL=/signup');
                return;
            }
        }
    }
}
