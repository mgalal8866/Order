<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Repositoryinterface\CommentRepositoryinterface;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $CommentRepository;
    public function __construct(CommentRepositoryinterface $CommentRepository)
    {
        $this->CommentRepository = $CommentRepository;
    }
    public function addcomment(Request $request) {

        $result =  $this->CommentRepository->add_comment($request);
        return Resp('',$result?'succes':'error',200,$result);
    }

}
