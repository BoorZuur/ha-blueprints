<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'icon',
    ];

    public function blueprints() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Blueprint::class);
    }
}
