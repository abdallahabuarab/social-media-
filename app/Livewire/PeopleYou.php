<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use illuminate\Support\Facades\Auth;
class PeopleYou extends Component
{

    public $users;
    public function mount()
    {
        $this->people();
    }
    public function people()
    {
        $user = User::find(Auth::user()->id);
        $friends = $user->friends;
        $userIds = [];

        if ($friends !== null) {
            foreach ($friends as $item) {
                if (isset($item['userid'])) {
                    $userIds[] = $item['userid'];
                }
            }

            $this->users = User::whereNotIn('id', $userIds)->get();
        } else {
            $this->users = User::all();
        }
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
                if($arr['userid'] == $userid2){
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
        $this->users=$this->users->fresh();

    }
    public function render()
    {
        return view('livewire.people-you');
    }
}
