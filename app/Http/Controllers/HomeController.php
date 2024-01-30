<?php

namespace App\Http\Controllers;
use APP\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function chat_uuid($uuid){
     return view('frontend.chat1',compact('uuid'));
    }
    public function add($userid){
        $profile=User::where('id',$userid)->with('posts')->first();

        return view('frontend.profile', compact('profile') );
    }
    public function chat($userid){

        $profile=User::where('id',$userid)->with('posts')->first();
        $currentUser = auth()->user();

       $users= User::where('id', '!=', $currentUser->id)->get();

        return view('frontend.chat', compact('profile','users') );
    }
    public function friends($userid){

        $profile=User::where('id',$userid)->with('posts')->first();

        return view('frontend.friends', compact('profile') );
    }
    public function updateprofileImage(request $request){
        // dd($request->all());
        $profile=User::where('id',$request->id)->first();

        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        $file = $request->file('profile_image') ;
        $fileName = $file->getClientOriginalName() ;
        $destinationPath = public_path().'/images' ;
        $file->move($destinationPath,$fileName);
        $profile->update([
        'profile_image' => $fileName

        ]);
        return redirect()->back()->with('info','image updated');
    }
    public function updatecoverImage(request $request){
        $profile=User::where('id',$request->id)->first();

        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        $file = $request->file('profile_image') ;
        $fileName = $file->getClientOriginalName() ;
        $destinationPath = public_path().'/images' ;
        $file->move($destinationPath,$fileName);
        $profile->update([
        'profile_cover' => $fileName

        ]);
        return redirect()->back()->with('info','image updated');
    }


}
