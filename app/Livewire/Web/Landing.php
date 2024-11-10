<?php

namespace App\Livewire\Web;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Landing extends Component
{
    #[Layout('layouts.web.app'), Title('قسم السلامة المهنية')]
    public function render()
    {
        dd(now()->format('h:i:s'));
        return view('livewire.web.landing');
    }
}
