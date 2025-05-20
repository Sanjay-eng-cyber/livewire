<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class UpdateUser extends Component
{
    public $u_id;
    public $name;
    public $email;
    public $password;
    public $check = true;

 public function updated($field){
     $this->validateOnly($field,[
     'name' => 'required|string|max:255|min:3',
            'email' => 'required|email|unique:users,email|min:8|max:30',
            'password' => 'required|min:6',
    ]);
}

    public function updateUser(){
           $this->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email|unique:users,email,' . $this->u_id,
            'password' => 'required|min:6',
        ]);
        $user = User::findOrFail($this->u_id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        if($user->save()){
            $this->check = false;
            session()->flash('success', 'User Updated successfully!');
            $this->reset(['name','email','password']);
        }
    }
    public function render()
    {
        return view('livewire.update-user');
    }
}
