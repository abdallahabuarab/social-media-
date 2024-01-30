<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable =[
        'userid',
        'content',
        'image',
        'type',
        'likes'

    ];
    public function user(){

        return $this->belongsTo(User::class,'userid','id');
    }
    public function comment(){

        return $this->hasMany(Comment::class,'postid','id');
    }
    public function isLikedBy($userId)
    {
        $likes = $this->likes;

        if ($likes) {
            foreach ($likes as $like) {
                if ($like['userid'] == $userId) {
                    return true;
                }
            }
        }

        return false;
    }
    public function totalLikes()
    {
        if($this->likes){
        return count($this->likes);
    }else{
        return 0;
    }
    }
    protected $casts =[
        'likes'=> 'json'
    ];

}
