<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class StudentList extends Component
{
    public $users;
    public $u_id;
    public $name;
    public $email;
    public $check = true;

    public function render()
    {
        return view('livewire.student-list');
    }

    public function mount()
    {
        $this->loadUsers();
    }

    public function loadUsers()
    {
        $this->users = User::all();
    }

    #[On('user-added')]
    public function updateList()
    {
        $this->loadUsers();
    }

    public function edit($id)
    {
        $this->u_id = $id;
        $user = User::findOrFail($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->check = false;
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        if ($user->delete()) {
            $this->loadUsers();
            session()->flash('success', 'User Deleted successfully');
        }
    }
}
