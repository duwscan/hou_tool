<?php

namespace App\Models;

use App\Http\Requests\ThreadMessageRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Thread extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'thread_name',
        'created_at',
        'renamed',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function messages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ThreadMessage::class);
    }

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
        ];
    }

    public function sendMessage(ThreadMessageRequest $request,string $sender,string $messages=''): ThreadMessage
    {
        $filled =[
            'thread_id' => $this->id,
            'sender' => $sender,
            'timestamp' => now(),
        ];
        $isBot = $sender === 'bot' ;
        if($isBot){
            $filled['message'] = $messages;
        }
        $message = array_merge($request->validated(), $filled);
        return $this->messages()->create($message);
    }
}
