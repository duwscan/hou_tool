<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'link',
        'description'
    ];

    public function programs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Program::class);
    }

    public function graduateStandards(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(GraduateStandard::class);
    }
}
