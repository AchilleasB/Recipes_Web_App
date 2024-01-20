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
            $users = $this->userService->getAllUsers();
            header('Content-Type: application/json');
            echo json_encode($users);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->handleUserRequest('add');
        }

        if ($_SERVER["REQUEST_METHOD"] == "PUT") {
            $this->handleUserRequest('edit');
        }

        if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
            $this->handleUserRequest('delete');
        }


    }

    public function handleUserRequest($request_type)
    {
        $body = file_get_contents('php://input');
        $object = json_decode($body);

        if ($object === null && json_last_error() !== JSON_ERROR_NONE) {
            header('Content-Type: application/json');
            echo json_encode('Invalid JSON');
        }

        if ($request_type == 'add') {
            $user = new User();
            $user->setName(htmlspecialchars($object->name));
            $user->setEmail(htmlspecialchars($object->email));
            $user->setPassword(htmlspecialchars(password_hash($object->password, PASSWORD_DEFAULT)));
            $user->setRole(htmlspecialchars($object->role));

            if (!$this->userService->userExists($user->getEmail())) {
                if ($this->userService->validatePassword($object->password)) {
                    $this->userService->addUser($user);
                    $message = $user->getName() . ' was added successfully';
                } else {
                    $message = 'Password must be at least 8 characters long';
                }
            } else {
                $message = $user->getName() . ' already exists';
            }
        }

        if ($request_type == 'edit') {
            $user = new User();
            $user->setId(htmlspecialchars($object->id));
            $user->setName(htmlspecialchars($object->name));
            $user->setEmail(htmlspecialchars($object->email));
            $user->setRole(htmlspecialchars($object->role));

            if ($this->userService->editUser($user)) {
                $message = $user->getName() . ' was updated successfully';
            } else {
                $message = $user->getName() . ' was not updated';
            }
        }

        if ($request_type == 'delete') {
            if ($this->userService->deleteUser($object->id)) {
                $message = $object->name . ' was deleted';
            } else {
                $message = $object->name . ' was not deleted';
            }
        }

        header('Content-Type: application/json');
        echo json_encode(['message' => $message, 'user' => $object]);
    }
}
