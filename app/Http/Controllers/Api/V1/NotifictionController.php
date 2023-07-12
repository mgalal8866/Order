<?php

namespace App\Http\Controllers\Api\V1;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\NotificionResource;
use App\Repositoryinterface\NotifictionRepositoryinterface;

class NotifictionController extends Controller
{
    private $notifiRepositry;
    public function __construct(NotifictionRepositoryinterface $notifiRepositry)
    {
        $this->notifiRepositry = $notifiRepositry;
    }
    public function getnotifiction()
    {
        // $data = $this->notifiRepositry->getnotifiction();
        $data =  NotificionResource::collection($this->notifiRepositry->getnotifiction());
        return Resp($data, 'Success', 200, true);
    }

}
