<?php

namespace App\Livewire;

use Livewire\Component;

class Students extends Component
{
   public $students = ['sanjay','sarita','Ram'];
   
    public function render()
    {
        return view('livewire.students');
    }
}
