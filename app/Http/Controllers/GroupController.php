<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function index(){
$groups=Group::all();
        return view('frontend.groups',compact('groups'));

    }
    public function create($userid){
        $profile=User::where('id',$userid)->with('posts')->first();
        return view('frontend.group_create',compact('profile'));
    }
    public function store(Request $request){
        $fileName = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images' ;
            $file->move($destinationPath,$fileName);
        }
       Group::create([
            'name' => $request->name,
            'description' => $request->description,
            'image'=>$fileName,
            'user_id' => Auth::id()
        ]);
        return redirect()->route('group.index');
    }
    public function dashboard($groupid){
   $groups = Group::where('id',$groupid)->first();
        return view('frontend.group_dashboard',compact('groups'));
    }
   /* public function follow(Group $group){
        User::auth()->groups()->attach($group);
        return view('frontend.group_dashboard',compact('groups'));
    }
    */
    public function follow(Group $group)
    {
        Auth::user()->groups()->attach($group);

        return redirect()->back()->with('success', 'You are now following ' . $group->name);
    }

    public function unfollow(Group $group)
    {
        Auth::user()->groups()->detach($group);

        return redirect()->back()->with('success', 'You have unfollowed ' . $group->name);
    }
}
