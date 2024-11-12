<?php

namespace App\Livewire\Web;

use App\Http\Controllers\Services\FormService;
use App\Http\Controllers\Services\ImageService;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class Home extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $data = '';
    public $form_name = '';
    public $user = '';
    public $image = '';
    public $location_image_1 = '';
    public $location_image_2 = '';
    public $location_image_3 = '';
    public $location_image_4 = '';

    public function mount()
    {
        $this->user = auth()->user();
    }

    #[Layout('layouts.web.app'), Title('قسم السلامة - الرئيسية')]
    public function render()
    {
        return view('livewire.web.home');
    }

    #[On('submitting-data')]
    public function submit(FormService $formService, ImageService $imageService)
    {

        $data = json_decode($this->data, true);

        if (count($data) > 0) {
            $answer = $formService->store($data, $this->form_name);

            if (in_array($this->form_name, ["direct_status_report", 'daily_tour'])) {

                if ($answer) {
                    if ($this->form_name == "direct_status_report") {
                        $data['images']['image'] = $this->image;
                    }

                    if ($this->form_name == "daily_tour") {
                        $data['images']['location_image_1'] = $this->location_image_1;
                        $data['images']['location_image_2'] = $this->location_image_2;
                        $data['images']['location_image_3'] = $this->location_image_3;
                        $data['images']['location_image_4'] = $this->location_image_4;
                    }
                    $result = $imageService->store($data['images'], $answer, $this->form_name);
                }
            }

            $this->alertMessage('تم حفظ البيانات بنجاح', 'success');
        } else {
            $this->alertMessage('ادخل بيانات للحفظ !', 'error');
        }
    }

    public function alertMessage($message, $type)
    {
        $this->alert($type, '', [
            'toast' => true,
            'position' => 'center',
            'timer' => 3000,
            'text' => $message,
            'timerProgressBar' => true,
        ]);
    }
}
