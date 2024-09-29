<?php

namespace App\Http\Controllers\Chatbot;

use App\Dto\ThreadDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\ThreadRequest;
use App\Models\Thread;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Thread::class);
    }

    public function index()
    {
        $threads = Auth::user()->threads()->get()->map(fn($thread)=>new ThreadDto($thread));
        return $this->sendResponse($threads,"Lấy ra tất cả các threads thành công","threads");
    }

    public function store(ThreadRequest $request)
    {
       $thread = Auth::user()->createThread($request);
        return $this->sendResponse(new ThreadDto($thread),"Tạo thread thành công","thread");
    }

    public function show(Thread $thread)
    {
        return $this->sendResponse(new ThreadDto($thread),"Lấy ra thread thành công","thread");
    }

    public function update(ThreadRequest $request, Thread $thread)
    {
        $thread->update($request->validated());
        return $this->sendResponse(new ThreadDto($thread),"Cập nhật thread thành công","thread");
    }

    public function destroy(Thread $thread)
    {
        $thread->delete();
        return $this->sendResponse([],"Xóa thread thành công");
    }
}
