<?php

namespace App\Http\Controllers\Tag;

use App\Dto\TagDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Response;
use Str;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all()->map(fn(Tag $tag) => $this->modelToDto($tag)->toArray());
        return $this->sendResponse($tags, 'Tags retrieved successfully.',code:ResponseAlias::HTTP_OK);
    }

    public function store(TagRequest $request)
    {
        $tag= Tag::create($request->validated()+['slug'=>Str::slug($request->name)]);
        $this->sendResponse($this->modelToDto($tag), 'Tags created successfully.',code:ResponseAlias::HTTP_CREATED);
    }

    public function show(Tag $tag)
    {
        return $this->sendResponse($this->modelToDto($tag), 'Tag retrieved successfully.',"tag",code:ResponseAlias::HTTP_OK);
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->validated());
        return $this->sendResponse($this->modelToDto($tag), 'Tag updated successfully.',"tag",code:ResponseAlias::HTTP_OK);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return $this->sendResponse([],'Tag deleted successfully.',"tag",code:ResponseAlias::HTTP_OK);
    }
    private function modelToDto(Tag $tag){
        return new TagDto($tag);
    }
}
