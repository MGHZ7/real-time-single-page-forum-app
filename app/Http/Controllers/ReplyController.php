<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReplyResource;
use App\Model\Question;
use App\Model\Reply;
use Exception;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Question $question
     * @return AnonymousResourceCollection
     */
    public function index(Question $question)
    {
        return ReplyResource::collection($question->replies);
//        return Reply::latest()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Question $question
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Question $question, Request $request)
    {
        $question->replies()->create($request->all());

        return response()->json(
            [
                'message' => 'Reply Created Successfully',
                'code' => Response::HTTP_CREATED
            ],
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     *
     * @param Question $question
     * @param Reply $reply
     * @return ReplyResource
     */
    public function show(Question $question, Reply $reply)
    {
        return new ReplyResource($reply);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Reply $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Question $question
     * @param Request $request
     * @param Reply $reply
     * @return JsonResponse
     */
    public function update(Question $question, Request $request, Reply $reply)
    {
        $reply->update($request->all());

        return \response()->json(
            [
                'message' => 'Reply Updated Successfully',
                'code' => Response::HTTP_ACCEPTED
            ],
            Response::HTTP_ACCEPTED
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Question $question
     * @param Reply $reply
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Question $question, Reply $reply)
    {
        $reply->delete();

        return \response()->json([
            'message' => 'Reply Deleted Successfully',
            'code' => Response::HTTP_ACCEPTED
        ],
            Response::HTTP_ACCEPTED
        );
    }
}
