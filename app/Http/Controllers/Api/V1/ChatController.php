<?php

namespace App\Http\Controllers\Api\V1;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositoryinterface\ChatRepositoryinterface;

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

    $msg = $this->chatRepositry->sentmessage($request->message);
    event(new MessageSent($msg));
    return $msg;
    }

}
