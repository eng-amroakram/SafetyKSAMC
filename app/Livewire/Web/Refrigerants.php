<?php

namespace App\Livewire\Web;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Refrigerants extends Component
{
    #[Layout('layouts.web.app'), Title('قسم السلامة - المبردات')]
    public function render()
    {
        return view('livewire.web.refrigerants');
    }
}
