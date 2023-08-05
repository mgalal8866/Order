<?php
namespace App\Repositoryinterface;

interface ChatRepositoryinterface{
    public function sentmessage($message);
    public function getmessage();
}

