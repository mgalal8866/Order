<?php
namespace App\Repositoryinterface;

interface WishlistRepositoryinterface{
    public function getwishlist();
    public function addwishlist($id);
    public function delete($id);



}

