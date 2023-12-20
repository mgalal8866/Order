<?php

namespace App\Http\Controllers;


use App\Models\SalesHeader;
use App\Models\DeliveryHeader;

class PrintController extends Controller
{


    public function index($type=null,$id)
    {
        if($type= 'close'){
            $invo = SalesHeader::whereId($id)->with('salesdetails',function($q){
                return  $q->with('productdetails',function($qq){
                      return  $qq->with('productheader');
                });
              })->first();

        }else{
            $invo = DeliveryHeader::whereId($id)->with('salesdetails',function($q){
                return  $q->with('productdetails',function($qq){
                      return  $qq->with('productheader');
                });
              })->first();
        }
// dd( $invo);
      return view('print', compact('invo'));
    }




}
