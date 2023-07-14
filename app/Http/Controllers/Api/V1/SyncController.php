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
        foreach($request->all() as $index=>$item){

            $user = User::create([
            'client_fhonewhats'  =>$item->Client_fhoneWhats,
            'source_id'          =>$item->Client_id,
            'client_name'        =>$item->Client_name,
            'client_Balanc'      =>$item->Client_Balanc,
            'client_points'      =>$item->Client_points,
            'client_fhoneLeter'  =>$item->Client_fhoneLeter,
            'client_EntiteNumber'=>$item->Client_EntiteNumber,
            'region_id'          =>$item->Region_id,
            'lat_mab'            =>$item->Lat_mab,
            'long_mab'           =>$item->Long_mab,
            'client_state'       =>$item->Client_state,
            'client_Credit_Limit'=>$item->Client_Credit_Limit,
            'default_Sael'       =>$item->default_Sael,
            'client_note'        =>$item->Client_note,
            'client_code'        =>$item->Client_code,
            'categoryAPP'        =>$item->CategoryAPP,
            'last_active'        =>$item->last_active,
            'created_at'         =>$item->caret_data]);
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
