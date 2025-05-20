<?php

namespace App\Livewire;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Form extends Component
{
    public $name;
    public $email;
    public $password;
    public $users = [];
    
    public function updated($field){
$this->validateOnly($field,[
     'name' => 'required|string|max:255|min:3',
            'email' => 'required|email|unique:users,email|min:8|max:30',
            'password' => 'required|min:6',
]);
    }

    public function storeUser(){
           $this->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        if($user->save()){
            session()->flash('success', 'User added successfully!');
$this->reset(['name','email','password']);
$this->dispatch('user-added');
        }
    }
    public function render()
    {
        return view('livewire.form');
    }
}
