<?php
namespace App\Repositoryinterface;

interface CartRepositoryinterface{
    public function getcart();
    public function addtocart($product_id, $qty);
    public function deletecart($cart_id);
    public function applydeferred();



}

