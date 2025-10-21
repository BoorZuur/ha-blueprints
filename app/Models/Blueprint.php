<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blueprint extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'url',
        'blueprint',
        'category_id',
        'show'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
