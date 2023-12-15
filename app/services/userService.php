<?php
require __DIR__ . '/../repositories/userRepository.php';
require_once __DIR__ . '/../models/user.php';

class UserService
{
    private $userRepository;

    function __construct()
    {
        $this->userRepository = new UserRepository();

    }

    public function signup(User $user)
    {
        return $this->userRepository->addUser($user);

    }

    public function getAllUsers()
    {
        return $this->userRepository->getAllUsers();
    }

    public function getUserByEmail($email)
    {
        return $this->userRepository->getUserByEmail($email);
    }

    public function addUser($user)
    {
        return $this->userRepository->addUser($user);
    }

    public function editUser($user)
    {
        return $this->userRepository->editUser($user);
    }

    public function deleteUser($id)
    {
        $this->userRepository->deleteFavoritesByUserId($id);
        return $this->userRepository->deleteUser($id);
    }


    function userExists($email)
    {
        $existingUser = $this->getUserByEmail($email);
        if ($existingUser) {
            return true;
        } else {
            return false;
        }
    }

    function create_user($name, $email, $password)
    {
        $user = new User();
        $user->setName($name);
        $user->setEmail($email);
        $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
        $user->setRole(User::USER);

        return $user;
    }

    function validatePassword($password)
    {
        if ($password != null && strlen($password) >= 8 && strlen($password) <= 20) {
            return true;
        } else {
            return false;
        }
    }
}
?>