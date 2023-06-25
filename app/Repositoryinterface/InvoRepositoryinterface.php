<?php
namespace App\Repositoryinterface;

interface InvoRepositoryinterface{
    public function placeorder($request);
    public function getopeninvo();
    public function getcloseinvo();
    public function getinvoicedetails($id);
}

