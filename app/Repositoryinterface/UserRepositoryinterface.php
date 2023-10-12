<?php
namespace App\Repositoryinterface;

interface UserRepositoryinterface{

    public function login($request);
    public function loginv2($request);
    public function edit($request);
    public function register($request);
    public function getusers($pg = 30);
    public function logout();
    public function sendtoken($token);
    public function sendotp($request);
    public function checkphone($phone);
    public function checkanswer($request);
    public function verificationcode($request);

}

