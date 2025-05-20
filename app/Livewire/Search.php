<?php

namespace App\Livewire;

use Livewire\Component;

class Search extends Component
{
    public $message = array('name' => 'sanjay ahirwal');

    public function render()
    {
        return view('livewire.search');
    }
}
