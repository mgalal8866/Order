<?php
namespace App\Repositoryinterface;

interface UserRepositoryinterface{

    public function login($request);
    public function register($request);
    public function logout();

}

