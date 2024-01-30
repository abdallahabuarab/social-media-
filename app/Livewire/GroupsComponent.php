<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Group;
use illuminate\Support\Facades\Auth;
class GroupsComponent extends Component
{

    public $profile;

    public $GroupId;
    public $post;
    public $posts;
    public $content;
    public $postId;
    public $auth;

    public function mount($GroupId){
        $this->GroupId=$GroupId;
        $this->auth=Auth::user()->id;
        $this->profile=User::where('id',Auth::user()->id)->with('posts')->first();

    }


    public function post(Post $post)
    {
        $this->post = $post;

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
    public function render()
    {
        $this->posts = Post::where('type',$this->GroupId)->with('user')->get();
        return view('livewire.groups-component');
    }
}
