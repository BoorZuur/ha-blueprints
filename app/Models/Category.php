<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function blueprints() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Blueprint::class);
    }
}
