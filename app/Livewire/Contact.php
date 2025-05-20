<?php

namespace App\Livewire;

use Livewire\Component;

class Contact extends Component
{
    public function render()
    {
        $name = 'Sanjay Test';
        $datas = ['name'=> 'sanjay ahirwal', 'email'=>'sanjay@gmail.com'];
        return view('livewire.contact',['datas'=>$datas, 'name' => $name]);
    }
}
