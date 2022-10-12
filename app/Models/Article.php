<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title',
        'content',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'article_categories');
    }

    public function comments(): hasMany
    {
        return $this->hasMany(Comment::class, 'article_id')->orderBy('id', 'DESC');
    }
}
