<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index(){

        $posts= Post::with('comment')->orderBy('created_at', 'desc')->get();
        return view('frontend.home',compact('posts'));

    }
    public function store(Request $request){

        $request->validate([
            'content' => 'required|max:500',
            'file' => 'image|mimes:jpeg,png,jpg|max:5000',
        ], [
            'content.required' => 'The content field is required.',
            'content.max' => 'The content must not exceed 500 characters.',
            'file.image' => 'The uploaded file must be an image.',
            'file.mimes' => 'Only JPEG, PNG, and JPG files are allowed.',
            'file.max' => 'The file size must not exceed 5000 kilobytes.',
        ]);


        // Handle file upload if an image is provided
        $fileName = null;
        if ($request->hasFile('postimage')) {
            $file = $request->file('postimage') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images' ;
            $file->move($destinationPath,$fileName);
        }
        Post::create([
            'userid'=> $request->id,
            'content'=>$request->content,
            'image'=>$fileName,


        ]);
        return redirect()->back()->with('message','post added succesfully') ;
    }
    public function store2(Request $request){

        $request->validate([
            'content' => 'required|max:500',
            'file' => 'image|mimes:jpeg,png,jpg|max:5000',
        ], [
            'content.required' => 'The content field is required.',
            'content.max' => 'The content must not exceed 500 characters.',
            'file.image' => 'The uploaded file must be an image.',
            'file.mimes' => 'Only JPEG, PNG, and JPG files are allowed.',
            'file.max' => 'The file size must not exceed 5000 kilobytes.',
        ]);


        // Handle file upload if an image is provided
        $fileName = null;
        if ($request->hasFile('postimage')) {
            $file = $request->file('postimage') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images' ;
            $file->move($destinationPath,$fileName);
        }
        Post::create([
            'userid'=> $request->id,
            'content'=>$request->content,
            'image'=>$fileName,
            'type'=>$request->Groupid,


        ]);
        return redirect()->back()->with('message','post added succesfully') ;
    }
    // public function addlike($authid,$postid){
    //     $post=Post::find($postid);
    //     $like=$post->likes;
    //     $islike=0;


    //     if($like){
    //         foreach($like as $like){
    //             if($like['userid']==$authid){
    //                 $islike++;
    //                 break;
    //             }
    //         }
    //     }else{
    //         $like= [];

    //     }
    //     if($islike == 0){
    //         array_push($like,['userid',$authid]);
    //         $post->update([
    //             'likes' => $like,
    //         ]);
    //     }
    //     return redirect()->back();

    // }
    public function addLike($authId, $postId)
{
    $post = Post::find($postId);
    $likes = $post->likes;
    $isLiked = false;

    if ($likes) {
        foreach ($likes as $like) {
            if ($like['userid'] == $authId) {
                $isLiked = true;
                break;
            }
        }
    } else {
        $likes = [];
    }

    if (!$isLiked) {
        $likes[] = ['userid' => $authId];

        $post->update([
            'likes' => $likes,
        ]);
    }

    return redirect()->back();
}
public function removelike($authId, $postId)
{
    $post = Post::find($postId);
    $likes = $post->likes;

    if ($likes) {
        foreach ($likes as $key => $like) {
            if ($like['userid'] == $authId) {
                unset($likes[$key]);
                break;
            }
        }

        $post->update([
            'likes' => array_values($likes), // Reindex the array
        ]);
    }

    return redirect()->back();
}


}
