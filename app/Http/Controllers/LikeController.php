<?php

namespace App\Http\Controllers;

use App\Model\Like;
use App\Model\Reply;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('JWT');
    }

    public function likeIt(Reply $reply)
    {
        //Try store object using HasMany object
       /* $reply->likes()->create([
            'user_id' => 1
        ]);*/

       Like::create([
           'user_id' => 1,
           'reply_id' => $reply->id
        ]);

       return response()->json(
           [
               'message' => 'Like Is Stored Successfully',
               'code' => Response::HTTP_CREATED
           ],
           Response::HTTP_CREATED
       );
    }

    public function unLikeIt(Reply $reply)
    {
//        $reply->likes()->where(['user_id', auth()->user()->id])->first()->delete();
        $reply->likes()->where('user_id', 1)->first()->delete();

        return response()->json(
            [
                'message' => 'Reply is unliked',
                'code' => Response::HTTP_ACCEPTED
            ],
            Response::HTTP_ACCEPTED
        );
    }
}
