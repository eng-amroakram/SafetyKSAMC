<?php

namespace App\Livewire\Web;

use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

class Signature extends Component
{
    use LivewireAlert;

    public $signed = '';

    #[Layout('layouts.web.signature'), Title('قسم السلامة - التوقيع')]
    public function render()
    {
        return view('livewire.web.signature');
    }

    #[On('submitting-signed')]
    public function submit()
    {
        $user = User::find(auth()->id());

        if (!file_exists(public_path('upload'))) {
            mkdir(public_path('upload'), 0777, true);
        }

        if ($this->signed) {
            $folderPath = public_path('upload/');
            $image_parts = explode(";base64,", $this->signed);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $path = uniqid() . '.' . $image_type;
            $file = $folderPath . $path;
            file_put_contents($file, $image_base64);
            $user->signature = $path;
            $user->save();
            return redirect()->route('web.home');
        } else {
            $this->alertMessage('لم يتم التوقيع، يرجى المحاولة مرة اخرى', 'danger');
        }
    }

    public function alertMessage($message, $type)
    {
        $this->alert($type, '', [
            'toast' => true,
            'position' => 'top-start',
            'timer' => 3000,
            'text' => $message,
            'timerProgressBar' => true,
        ]);
    }
}
