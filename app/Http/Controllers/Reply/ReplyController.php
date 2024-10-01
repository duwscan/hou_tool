<?php

namespace App\Http\Controllers\Reply;

use App\Dto\ReplyDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReplyRequest;
use App\Models\Post;
use App\Models\Reply;

class ReplyController extends Controller
{
    public function index(Post $post)
    {
        $replies = $post->replies()->get()->map(fn ($reply) => $this->modelToDto($reply));
        return $this->sendResponse($replies, 'Replies retrieved successfully.', 'replies');
    }

    public function store(Post $post ,ReplyRequest $request)
    {
        $reply = $post->newReply($request->body);
        return $this->sendResponse($this->modelToDto($reply),'Thêm bình luận thành công');
    }

    public function update(Post $post, Reply $reply,ReplyRequest $request)
    {
        $reply->update($request->validated());
        return $this->sendResponse($this->modelToDto($reply), 'Cập nhật bình luận thành công');
    }

    public function destroy(Post $post,Reply $reply)
    {
        $reply->delete();
        return $this->sendResponse([],'Cập nhật bình luận thành công');
    }

    function modelToDto(Reply $reply)
    {
        return new ReplyDto($reply);
    }

}
