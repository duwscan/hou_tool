<?php

namespace App\Http\Controllers\Chatbot;

use App\Dto\ThreadDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\ThreadRequest;
use App\Models\Thread;
use App\Services\ChatBotService;
use App\ultis\toast\Toaster;
use App\ultis\toast\ToastType;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ThreadController extends Controller
{
    public function __construct(private readonly ChatBotService $chatBotService)
    {
//        $this->authorizeResource(Thread::class);
    }

    public function index()
    {
        if(!auth()->user() || \request()->has('empty_thread')) {
            return Inertia::render('Chat', [
                'empty_thread' => true,
            ]);
        }
        $threads = Thread::create([
            'user_id' => auth()->id(),
            'thread_name' => 'Đoạn chat mới',
        ]);
        return to_route('threads.chats.index', $threads->id);
    }

    public function store(Request $request) {
        $request->validate([
            'message' => 'required|string',
        ]);

        $thread = Thread::create([
            'user_id' => auth()->id(),
            'thread_name' => 'Đoạn chat mới',
        ]);

        $this->chatBotService->getAnswer(request('message'), $thread);
        return to_route('threads.chats.index', $thread->id);
    }

    public function show(Thread $thread)
    {
        return $this->sendResponse(new ThreadDto($thread), "Lấy ra thread thành công", "thread");
    }

    public function update(ThreadRequest $request, Thread $thread)
    {
        $thread->update($request->validated() + [
                'renamed' => true,]);
        Toaster::toast('Cập nhật thread thành công', ToastType::SUCCESS);
        return back();
    }

    public function destroy(Thread $thread)
    {
        $thread->delete();
        if (route('threads.chats.index',$thread->id) === back()->getTargetUrl()) {
            return redirect()->route('dashboard')
                ->withToast(new Toaster('Xóa thread thành công', ToastType::SUCCESS));
        }

        return back()->withToast(new Toaster('Xóa thread thành công', ToastType::SUCCESS));
    }
}
