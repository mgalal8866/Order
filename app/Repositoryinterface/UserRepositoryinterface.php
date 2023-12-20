<?php
namespace App\Repositoryinterface;

interface UserRepositoryinterface{

    public function login($request);
    public function edit($request);
    public function register($request);
    public function getusers($pg = 30,$search=null);
    public function logout();
    public function sendtoken($token);
    public function sendotp($request);
    public function verificationcode($request);
    public function checkphone($phone);
    public function checkanswer($request);



    // public function login_v2($request);
    // public function edit_v2($request);
    // public function register_v2($request);
    // public function checkphone_v2($phone);
    // public function checkanswer_v2($request);
    public function getuserdata();

}

