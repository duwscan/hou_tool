<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Program extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'faculty_id',
        'name',
        'file_path',
    ];

    public $timestamps = false;

    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }
}
