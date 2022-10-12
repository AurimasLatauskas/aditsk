<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function article(): BelongsToMany
    {
        return $this->belongsToMany(Article::class);
    }
}
