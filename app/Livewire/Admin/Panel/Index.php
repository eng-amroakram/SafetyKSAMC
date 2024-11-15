<?php

namespace App\Livewire\Admin\Panel;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    #[Layout('layouts.admin.app'), Title('لوحة التحكم - الصفحة الرئيسية')]
    public function render()
    {
        return view('livewire.admin.panel.index');
    }
}
