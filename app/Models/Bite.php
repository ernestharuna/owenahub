<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bite extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'content',
        'position'
    ];

    public function slice(): BelongsTo
    {
        return $this->belongsTo(Slice::class);
    }
}
