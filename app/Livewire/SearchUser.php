<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use League\Uri\QueryString;

class SearchUser extends Component
{
    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.search-user', [
            'users' => User::where('name', 'like', '%' . $this->search . '%')->get(),
        ]);
    }
}
