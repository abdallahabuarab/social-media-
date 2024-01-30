<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use illuminate\Support\Facades\Auth;
use App\Models\Comment;



class HomePosts extends Component
{

    public $content;
    public $post;
    public function render()
    {
        $posts= Post::where('type',null)->with('comment')->orderBy('created_at', 'desc')->get();

        return view('livewire.home-posts',compact('posts'));
    }
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

        $this->post = $post->fresh();
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

        // Update the likes directly on the Eloquent model
        $post->likes = array_values($likes);
        $post->save();
    }

    // Refresh the Livewire component data
    $this->post = $post->fresh();
}
public function addComment($postid)
{
    $userid =Auth::user()->id;
    $post = Post::find($postid);
    $this->validate([
        'content' => 'required|min:3',
    ]);

     Comment::create([
        'content' => $this->content,
        'userid' => $userid,
        'postid' => $postid,
    ]);



    // Clear the input field after adding the comment
    $this->content = '';

    // Refresh the post data to reflect the new comment
    $this->post = $post->fresh();
}
}
