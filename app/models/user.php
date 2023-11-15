<?php

class User implements JsonSerializable
{

    private int $id;
    private string $name;
    private string $email;
    private string $password;
    private string $role;

    const ADMINISTRATOR = "admin";
    const USER = "user";

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setRole(string $role): void
    {
        if ($role !== self::ADMINISTRATOR && $role !== self::USER) {
            throw new InvalidArgumentException('Invalid role');
        }
        
        $this->role = $role;
    }


    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'role' => $this->role
        ];
    }

}

?>