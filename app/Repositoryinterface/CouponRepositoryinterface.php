<?php
namespace App\Repositoryinterface;

interface CouponRepositoryinterface{
    public function checkcoupon($code);
    public function getall();
}

