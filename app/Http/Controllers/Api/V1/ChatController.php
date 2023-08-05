<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Repositoryinterface\ChatRepositoryinterface;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    private $chatRepositry;
    public function __construct(ChatRepositoryinterface $chatRepositry)
    {
        $this->chatRepositry = $chatRepositry;
    }

   public function getmessage()  {

    return $this->chatRepositry->getmessage();
    }
   public function sentmessage(Request $request)  {

    return $this->chatRepositry->sentmessage($request->message);
    }

}
