<?php

namespace App\Models;

use App\Dto\ReplyDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'tittle',
        'body',
        'slug',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function replies(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Reply::class);
    }

    public function tags(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }

    public function attachTags(array $tags): void
    {
        $this->tags()->sync($tags, true);
    }

    public function newReply($data): Reply
    {
        return $this->replies()->create([
            'body' => $data,
            'user_id' => Auth::id(),
        ]);
    }

}
