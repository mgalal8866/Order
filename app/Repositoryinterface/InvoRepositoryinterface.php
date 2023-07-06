<?php
namespace App\Repositoryinterface;

interface InvoRepositoryinterface{
    public function placeorder($request);
    public function getopeninvo();
    public function getcloseinvo();
    public function getinvoicedetailsclose($id);
    public function getinvoicedetailsopen($id);
}

