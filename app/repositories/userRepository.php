<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . ' /../models/user.php';

class UserRepository extends Repository
{

    public function getAllUsers()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM users");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $users = $stmt->fetchAll();

            return $users;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getUserByEmail($email)
    {
        try {
            $stmt = $this->connection->prepare("SELECT id, name, email, password, role FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $stmt->fetch();

            if (!$user) {
                return null;
            }
            return $user;
        } catch (PDOException $e) {
            echo $e;
        }

    }

    public function addUser(User $user)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO users (name, password, email, role) VALUES (:name, :password, :email, :role)");
            $stmt->execute([
                'name' => $user->getName(),
                'password' => $user->getPassword(),
                'email' => $user->getEmail(),
                'role' => $user->getRole()
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function editUser(User $user)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE users SET name = :name, email = :email, role = :role WHERE id = :id");
            $stmt->execute([
                'id' => $user->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'role' => $user->getRole()
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function deleteUser($id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM users WHERE id = :id");
            $stmt->execute([
                'id' => $id
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e;
        }
    }
  
}

?>