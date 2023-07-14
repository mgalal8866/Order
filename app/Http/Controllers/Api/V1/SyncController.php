<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SyncController extends Controller
{
    function client(Request $request) {
        Log::error($request->all());
        foreach($request['upload'] as $index=>$item){

            $user = User::create([
            'client_fhonewhats'  =>$item['client_fhonewhats'],
            'source_id'          => $item['id'],
            'client_name'        =>$item['client_name'],
            'client_Balanc'      =>$item['client_Balanc'],
            'client_points'      =>$item['client_points'],
            'client_fhoneLeter'  =>$item['client_fhoneLeter'],
            'client_EntiteNumber'=>$item['client_EntiteNumber'],
            'region_id'          =>$item['region_id'],
            'lat_mab'            =>$item['lat_mab'],
            'long_mab'           =>$item['long_mab'],
            'client_state'       =>$item['client_state'],
            'client_Credit_Limit'=>$item['client_Credit_Limit'],
            'default_Sael'       =>$item['default_Sael'],
            'client_note'        =>$item['client_note'],
            'client_code'        =>$item['client_code'],
            'categoryAPP'        =>$item['categoryAPP'],
            'source_type'        =>$item['source_type'],
            'last_active'        =>$item['last_active'],
            'created_at'         =>$item['created_at']]);
            $results[$index] =['id'=> $user->id, 'source_id' => $user->source_id] ;
        }
        $data = ['users_online'=>User::where('source_id', null)->get(), 'results'=> $results];
        return  $data;
    }

    function clienttest() {
            return array(['id'=>'1']);
    }
    function categoryapp(Request $request) {

    }
}
