<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'image', 'slug', 'content', 'status', 'view_count'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getCreatedAtAttribute()
    {
        return date('M d, Y', strtotime($this->attributes['created_at']));
    }

    public function scopePublished($query)
    {
        return $query->where('status', 1);
    }
    
    public function isSelectedTags($post, $tag_id)
    {
        foreach($post->tags as $postTag){
            if($postTag->id == $tag_id){
                echo 'selected';
            }
        }
    }

    public function isSelectedCategories($post, $category_id)
    {
        foreach($post->categories as $postCategory){
            if($postCategory->id == $category_id){
                echo 'selected';
            }
        }
    }
    
    public function getPostImage()
    {
        if( $this->image ){
            return asset('uploads/post/'.$this->image);
        }else{
            return asset('uploads/img_default.png');
        }
    }

    public function isLikePost($user, $post_id)
    {
        $isLikePost = $user->like_posts()->where('post_id', $post_id)->count();

        return $isLikePost == 0 ? 'btn btn-like' : 'btn btn-like active';
    }

    public function like_count()
    {
        return $this->belongsToMany(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
