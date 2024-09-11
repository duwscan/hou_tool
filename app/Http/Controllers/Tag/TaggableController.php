<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaggableRequest;
use App\Models\Post;
use App\Models\Taggable;

class TaggableController extends Controller
{
    public function store(Post $post ,TaggableRequest $request)
    {

        return Taggable::create($request->validated());
    }


    public function update(TaggableRequest $request, Taggable $taggable)
    {
        $this->authorize('update', $taggable);
        $taggable->update($request->validated());
        return $taggable;
    }

    public function destroy(Taggable $taggable)
    {
        $this->authorize('delete', $taggable);

        $taggable->delete();

        return response()->json();
    }
}
