<?php
require __DIR__ . '/../../services/userService.php';

class UsersController
{
    private $userService;

    function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    { 
        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            // return all users in the database as JSON
            $users = $this->userService->getAllUsers();
            header('Content-Type: application/json');
            echo json_encode($users);

        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // read JSON from the request, convert it to an user object
            $body = file_get_contents('php://input');
            $object = json_decode($body);

            if($object === null && json_last_error() !== JSON_ERROR_NONE) {
                header('Content-Type: application/json');
                echo json_encode(['error' => 'Invalid JSON']);
                return;
            }

            $user = new User();
            $user->setName(htmlspecialchars($object->name));
            $user->setEmail(htmlspecialchars($object->email));
            $user->setPassword(htmlspecialchars(password_hash($object->password, PASSWORD_DEFAULT)));
            $user->setRole(htmlspecialchars($object->role));

            if (!$this->userService->userExists($user->getEmail())) {
                if ($this->userService->validatePassword($object->password)) {
                    $this->userService->addUser($user);
                    header('Content-Type: application/json');
                    echo json_encode(['success' => 'New user added']);
                } else {
                    header('Content-Type: application/json');
                    echo json_encode(['error' => 'Try another password']);
                }
            } else {
                header('Content-Type: application/json');
                echo json_encode(['error' => 'User already exists']);
            }
        }    
    }

    public function editUser(){

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $body = file_get_contents('php://input');
            $object = json_decode($body);

            if($object === null && json_last_error() !== JSON_ERROR_NONE) {
                header('Content-Type: application/json');
                echo json_encode(['error' => 'Invalid JSON']);
                return;
            }

            $user = new User();
            $user->setId(htmlspecialchars($object->id));
            $user->setName(htmlspecialchars($object->name));
            $user->setEmail(htmlspecialchars($object->email));
            $user->setRole(htmlspecialchars($object->role));

            if ($this->userService->editUser($user)) {
                header('Content-Type: application/json');
                echo json_encode(['success' => 'User edited']);
            } else {
                header('Content-Type: application/json');
                echo json_encode(['error' => 'User NOT edited']);
            }
        }
    } 

    public function deleteUser($user_id){
        if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
            $this->userService->deleteUser($user_id);
            header('Content-Type: application/json');
            echo json_encode(['success' => 'User deleted']);
        }
    }

}
