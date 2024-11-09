<?php

namespace App\Livewire\Partials;

use Livewire\Component;

class PageHeader extends Component
{
    public $title = '';
    public $label = '';
    public $model = '';
    public $user = '';

    public function mount($title, $label, $model, $user)
    {
        $this->title = $title;
        $this->label = $label;
        $this->model = $model;
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.partials.page-header');
    }
}
