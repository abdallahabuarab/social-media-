<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(request $request){
        Comment::create([
            'userid' => $request->userid,
            'postid'=> $request->postid,
            'content' => $request->content,


        ]);

        return redirect()->back();
    }
}
