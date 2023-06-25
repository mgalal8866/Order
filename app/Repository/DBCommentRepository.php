<?php

namespace App\Repository;

use Carbon\Carbon;
use App\Models\comment;
use Illuminate\Support\Facades\Auth;
use App\Repositoryinterface\CommentRepositoryinterface;


class DBCommentRepository implements CommentRepositoryinterface
{
    public function add_comment($request)
    {
       comment::create(['comment'=>$request->comment,'evalution'=>$request->evalution,'user_id'=>  Auth::user()->id]);
    }
    public function get_comment()
    {
        comment::where('')->get();

    }
}
