<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReplyRequest;
use App\Models\Reply;

class ReplyController extends Controller
{
    public function index()
    {
        return Reply::all();
    }

    public function store(ReplyRequest $request)
    {
        return Reply::create($request->validated());
    }

    public function show(Reply $reply)
    {
        return $reply;
    }

    public function update(ReplyRequest $request, Reply $reply)
    {
        $reply->update($request->validated());

        return $reply;
    }

    public function destroy(Reply $reply)
    {
        $reply->delete();
        return response()->json();
    }
}
