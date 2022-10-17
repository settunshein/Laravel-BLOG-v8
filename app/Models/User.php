<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getProfilePhotoPath()
    {
        if( $this->image ){
            return asset('user/'.$this->image);
        }else{
            return "
                https://ui-avatars.com/api/?background=006699&color=fff&name=$this->name
            ";
        }
    }

    public function getCreatedAtAttribute()
    {
        return date('M d, Y', strtotime($this->attributes['created_at']));
    }

    public function isDisabledDelete($user_id)
    {
        echo $this->id == $user_id  ? 'disabled' : '';
    }

    public function like_posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
