<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Self_;

class Post extends Model
{
    protected $fillable = ['title', 'subtitle', 'description', 'author', 'slug'];

    public const RELATIONSHIP_POST_CATEGORY = 'post_category';

    public function author()
    {
        return $this->belongsTo(User::class,'author', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, self::RELATIONSHIP_POST_CATEGORY,'post', 'category');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'item');
    }

    public function getCreatedBrAttribute()
    {
        return date('d/m/Y H:i', strtotime($this->created_at));
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
