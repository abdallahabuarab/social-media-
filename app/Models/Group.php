<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{

    use HasFactory;
    protected $fillable =[
        'name',
        'description',
        'user_id',
        'image'
    ];





    public function users()
    {
        return $this->belongsToMany(User::class, 'group_user')->withTimestamps();
    }

}
