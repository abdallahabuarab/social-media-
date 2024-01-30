<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Group;
use Livewire\Component;

class SearchComponent extends Component
{
    public $query = '';
    public $users;
    public $groups;

    public function searchUsers()
    {
        if($this->query==''){
$this->users=[];
        }
        else{
        $this->users = User::where('name', 'like', '%' . $this->query . '%')->get();
    }
}
public function searchGroups()
{
    if ($this->query == '') {
        $this->groups = [];
    } else {
        $this->groups = Group::where('name', 'like', '%' . $this->query . '%')->get();
    }
}
    public function render()
    {
        $this->searchUsers(); // Call the searchUsers method to populate $users
        $this->searchGroups();

        return view('livewire.search-component');
    }
}
