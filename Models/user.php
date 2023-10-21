<?php

require_once __DIR__ ."/../Repositories/UserRepository.php";
class User
{
    private $repository;
    public $name;
    public $email;
    public $password;
    public function __construct($db)
    {
        
        $this->repository = new UserRepository($db);
    }

    public function register(){

       return $this->repository->register($this->name, $this->email, $this->password);
    }

    public function login(){
        return $this->repository->login($this->email, $this->password);
    }
}