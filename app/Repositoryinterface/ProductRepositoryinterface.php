<?php
namespace App\Repositoryinterface;

interface ProductRepositoryinterface{
    public function getprobycat($id);
    public function searchproduct($search);
    public function getoffers();
}

