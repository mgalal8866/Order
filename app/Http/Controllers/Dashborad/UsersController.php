<?php

namespace App\Http\Controllers\dashborad;
use App\Http\Controllers\Controller;
use App\Repositoryinterface\UserRepositoryinterface;

class UsersController extends Controller
{
    private $userRepositry;
    public function __construct(UserRepositoryinterface $userRepositry)
    {
        $this->userRepositry = $userRepositry;
    }
    public function getuser(){
      $users =   $this->userRepositry->getusers();
      return view('te',compact('users'));
    }
}
