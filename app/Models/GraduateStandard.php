<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class GraduateStandard extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'faculty_id',
        'name',
        'file_path',
    ];
    protected $appends = [
        'full_url'
    ];

    public $timestamps = false;

    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }

    protected function getFullUrlAttribute()
    {
        return $this->file_path ? Storage::url($this->file_path) : null;
    }
}
