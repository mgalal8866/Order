<?php

namespace App\Repository;

use Carbon\Carbon;
use App\Models\comment;
use App\Models\SalesHeader;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositoryinterface\CommentRepositoryinterface;
use Illuminate\Support\Facades\Log;

class DBCommentRepository implements CommentRepositoryinterface
{
    public function add_comment($request)
    {
        DB::beginTransaction();
        try {
          $comment = comment::create(['comment'=>$request->comment,'evalution'=>$request->evalution,'user_id'=> Auth::guard('api')->user()->id]);
          SalesHeader::where('id',$request->invo_id,)->update(['comment_id'=>  $comment->id]);
           DB::commit();
           return true;
        } catch (\Exception $e) {
            Log::warning($e->getMessage());
            DB::rollback();
            return false;
          // something went wrong
      }
    }
    public function get_comment()
    {
        comment::where('')->get();

    }
}
