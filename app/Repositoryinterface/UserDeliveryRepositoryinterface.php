<?php
namespace App\Repositoryinterface;

interface UserDeliveryRepositoryinterface{

    public function login($request);
    public function edit($request);
    public function register($request);
    public function getusers();
    public function logout();
    public function sendtoken($token);
    public function updatemap($request);

}

