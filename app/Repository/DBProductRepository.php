<?php

namespace App\Repository;


use App\Models\ProductDetails;
use App\Http\Resources\ProductCollectionResource;
use App\Models\ProductHeader;
use App\Repositoryinterface\ProductRepositoryinterface;

class DBProductRepository implements ProductRepositoryinterface
{
//     public function getprobycat($id)
//     {
//         // \DB::enableQueryLog(); // Enable query log
//         return Resp(new ProductCollectionResource(ProductDetails::Getcategory($id)->paginate(10)), 'success', 200, true)->getData(true);
//         // dd(\DB::getQueryLog()); // Show results of log
//     }
//     public function getoffers()
//     {
//         // \DB::enableQueryLog(); // Enable query log
//         return Resp(new ProductCollectionResource(ProductDetails::Getoffers()->paginate(10)), 'success', 200, true)->getData(true);
//         // \DB::getQueryLog(); // Show results of log
//     }
//     public function searchproduct($search)
//     {
//         if($request->search != ''){
//             $input= $request->search;

//          $ss=  branchs::whereActive(0)->whereAccept(0)->where(function ($query) use ($request) {
//                  $reg = regions::main($request->region_id) ;
//                  if( $reg->main != null and $reg->main == true){
//                      $query->whereCityId($reg->city_id);
//                   }else{
//                      $query->whereRegionId($request->region_id);
//                  };})
//                  ->WhereHas('stores', function($q) use ($request) {
//                             $q->where('name', 'LIKE', '%' . $request->search . '%')->whereActive(0);
//                          })->orWhere(function ($query) use ($request)
//                          {
//                              $query->whereActive(0)->whereAccept(0)->where(function ($query) use ($request) {
//                                  $reg = regions::main($request->region_id) ;
//                                  if( $reg->main != null and $reg->main == true){
//                                      $query->whereCityId($reg->city_id);
//                                   }else{
//                                      $query->whereRegionId($request->region_id);
//                                  };});

//                                  $query->whereHas('product', function ($query) use ($request)
//                                  {
//                                          $query->where('name', 'LIKE', '%'. $request->search . '%');
//                                  });

//                          })->paginate((int)getSettingsOf('app_pagforsearch_branch'));

//  }else{
//       $ss = branchs::whereRegionId($request->region_id)->whereActive(55)->paginate(setting('app_pagforsearch_branch'));
//  }
//  return $this->returnData('branches', new branchesCollection($ss),'Done');
//             $s = ProductDetails::when($search, function ($q) use ($search) {
//                 return $q->where('productd_barcode', 'like', '%'.$search.'%') })->
//                 when($city, function ($q) use ($city) {
//                     return $q->where('city', 'like', '%'.$city.'%');
//                 })->paginate(10);
    }
}
