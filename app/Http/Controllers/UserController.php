<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

$user=User::all();
return view('frontend.home',compact('user'));
    }




    public function update($authid,$userid2){
        $auth=User::find($authid);

        $user2=User::find($userid2);
        $json =$auth->friends;
        $json2 = $user2->friends ?? [];

        $num=0;
        if($json2 != null){

            foreach($json2 as $arr){
                if($arr['userid'] == $authid){
                    $num++;
                    break;
                }
            }
        }

        else
        {

            $json2[] = ['userid' => $authid , 'type'=> 'res','status' => 'pending'];

        }
        if($json != null){

            foreach($json as $arr){
                if($arr['userid'] == $authid){
                    $num++;
                    break;
                }
            }
        }
        else
        {

            $json[] = ['userid' => $userid2 , 'type'=> 'sent','status' => 'pending'];


        }
        if($json != null){

            foreach($json as $arr){
                if($arr['userid'] == $authid){
                    $num++;
                    break;
                }
            }
        }
        else
        {

            $json[] = ['userid' => $userid2 , 'type'=> 'sent','status' => 'pending'];

        }
        if($num == 0){


        $user2->update([
            'friends'=> $json2,
        ]);
        $auth->update([
            'friends'=> $json,
        ]);

        }
        return redirect()->back();
    }
    public function canelreq($authid,$userid){


        $auth=User::find($authid);
        $user2=User::find($userid);

        $json =$auth->friends;
        $json2=$user2->friends;
        foreach($json2 as $key =>$value){
            if($value['userid']==$authid){
                unset($json2[$key]);
                break;
            }
        }
        foreach($json as $key =>$value){
            if($value['userid']=$userid){
                unset($json[$key]);
                break;
            }
        }


        $user2->update([
            'friends'=> $json2,
        ]);
        $auth->update([
            'friends'=> $json,
        ]);


        return redirect()->back()->with('info' , 'cancel request succesfully');
    }
    public function accept($authid, $userid){
        $user = User::find($userid);
        $auth=User::find($authid);
        $json =$auth->friends;
        $friends=$user->friends;


        foreach($friends as $key => $friend){

            if($friend['userid'] == $authid){
                $friends[$key]['status'] = 'accepted';
                break;
            }
        }
        foreach($json as $key => $friend){
            if($friend['userid'] == $userid){
                $json[$key]['status'] = 'accepted';
                break;
            }
        }


        $user->update([
            'friends' => $friends
        ]);

        $auth->update([
            'friends' => $json
        ]);





        return redirect()->back()->with('message', 'You accepted the friend');
    }


}
