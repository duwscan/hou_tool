<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ThreadMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'thread_id',
        'sender',
        'timestamp',
        'message',
    ];

    public function thread(): BelongsTo
    {
        return $this->belongsTo(Thread::class);
    }

    protected function casts(): array
    {
        return [
            'timestamp' => 'datetime',
        ];
    }
}
