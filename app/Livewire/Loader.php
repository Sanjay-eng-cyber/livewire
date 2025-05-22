<?php

namespace App\Livewire;

use Livewire\Component;

class Loader extends Component
{
    public function payment() {}
    public function cancel() {}
    public function render()
    {
        return view('livewire.loader');
    }
}
