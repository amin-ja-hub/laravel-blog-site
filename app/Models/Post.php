<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'image', 'publish', 'category_id', 'views'];
    
    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    
}
