<?php

namespace App\Http\Controllers\Post;

use App\Dto\NewPostDto;
use App\Dto\PostDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Auth;
use Str;

class PostController extends Controller
{
    public function index()
    {
        $post = Auth::user()->posts()->get()->map(fn($post) => $this->modelToDto($post))->toArray();
        return $this->sendResponse($post, "Lấy ra tất cả các posts thành công",code:\Symfony\Component\HttpFoundation\Response::HTTP_OK );
    }

    public function store(PostRequest $request)
    {

        $post = Auth::user()->newPost(new NewPostDto($request->tittle, $request->body));
        $post->attachTags($request->tags);
        return $this->sendResponse($this->modelToDto($post), "Tạo post thành công", key: 'post', code: \Symfony\Component\HttpFoundation\Response::HTTP_CREATED);
    }

    public function show(Post $post)
    {
        return $this->sendResponse($this->modelToDto($post), "Lấy ra post thành công", code:\Symfony\Component\HttpFoundation\Response::HTTP_OK);
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->update([
            'tittle' => $request->tittle,
            'body' => $request->body,
            'slug' => Str::slug($request->tittle)
        ]);
        $post->attachTags([$request->tags]);
        return $this->sendResponse($this->modelToDto($post), "Cập nhật post thành công", code:\Symfony\Component\HttpFoundation\Response::HTTP_OK);
    }



    public function destroy(Post $post)
    {
        $post->delete();
        return $this->sendResponse([], "Xóa post thành công", code:\Symfony\Component\HttpFoundation\Response::HTTP_OK);
    }

    private function modelToDto($post)
    {
        return new PostDto($post);
    }
}
