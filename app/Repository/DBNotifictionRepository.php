<?php

namespace App\Repository;

use App\Models\notifiction;
use Illuminate\Support\Facades\Auth;
use App\Repositoryinterface\NotifictionRepositoryinterface;

class DBNotifictionRepository implements NotifictionRepositoryinterface
{
    public function getnotifiction()
    {
        return  notifiction::where('user_id', Auth::guard('api')->user()->id)->orwhere('user_id', null)->latest()->get();
    }

}
