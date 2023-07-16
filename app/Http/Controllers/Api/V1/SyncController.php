<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SyncController extends Controller
{
    function client(Request $request)
    {
        try {
            Log::warning($request->all());
            foreach ($request->all() as $index => $item) {
                $rules['Client_fhoneWhats'] = 'unique:users';
                $messages = [
                    'required'  => 'error required (:attribute)',
                    'unique'    => 'error unique (:attribute)',
                ];
                $validator = Validator::make($item, $rules,$messages);
                if ($validator->fails()) {
                    $errors[$index] = ['message'=> $validator->messages(), 'Client_id'=> $item['Client_id'] ];
                    continue;
                }
                    $user = User::create([
                        'client_fhonewhats'   => $item['Client_fhoneWhats'],
                        'source_id'           => $item['Client_id'],
                        'client_name'         => $item['Client_name'],
                        'client_Balanc'       => $item['Client_Balanc'],
                        'client_points'       => $item['Client_points'],
                        'client_fhoneLeter'   => $item['Client_fhoneLeter'],
                        'client_EntiteNumber' => $item['Client_EntiteNumber'],
                        'region_id'           => $item['Region_id'],
                        'lat_mab'             => $item['Lat_mab'],
                        'long_mab'            => $item['Long_mab'],
                        'client_state'        => $item['Client_state'],
                        'client_Credit_Limit' => $item['Client_Credit_Limit'],
                        'default_Sael'        => $item['default_Sael'],
                        'client_note'         => $item['Client_note'],
                        'client_code'         => $item['Client_code'],
                        'categoryAPP'         => $item['CategoryAPP'],
                        'client_Active'       => $item['Client_Active'],
                        'created_at'          => $item['caret_data']
                    ]);
                    $results[$index] = ['id' => $user->id, 'source_id' => $user->source_id];
            }

            $data = ['users_online' =>   User::where('source_id', null)->get() ?? [], 'results' => $results ?? [], 'errors' => $errors??[]];
            return  $data;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    function updateclient(Request $request)
    {
        Log::info('fun update client ',$request->all());
        foreach ($request->all() as $index => $item) {
            User::whereId($item['id'])->update(['source_id'=> $item['source_id']]);
        }
    }
    function categoryapp(Request $request)
    {
    }
}
