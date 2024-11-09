<?php

namespace App\Livewire\Admin\Panel;

use App\Models\Answer;
use App\Models\Form;
use App\Models\User;
use App\Traits\PDFHelper;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use ZipArchive;

class Viewer extends Component
{
    use PDFHelper;
    use LivewireAlert;

    public $user = null;
    public $answers = null;
    public $forms = [];
    public $form = null;
    public $form_id = null;
    public $pagination = 10;
    public $pdf_path = '';


    public function mount(User $user)
    {
        $this->setUser($user);
    }

    public function setUser($user)
    {
        $this->answers = $user->answers;
        $this->forms = Form::all();
        $this->user = $user;
    }

    #[Title('لوحة التحكم - تفاصيل الموظف'), Layout('layouts.admin.app')]
    public function render()
    {
        $solutions = Answer::where('user_id', $this->user->id)->where('form_id', $this->form)->paginate($this->pagination);
        return view('livewire.admin.panel.viewer', compact(['solutions']));
    }

    public function openForm($id)
    {

        $this->setUser($this->user);

        $this->pdf_path = "";

        $answer = $this->answers->where('id', $id)->first();

        $data = $answer->solutions;
        $data['date'] = $answer->created_at->format("Y-m-d");

        $data['signature_image'] = public_path("upload/64ebaa47be8b0.png");
        $name = $this->fillPdf($data, $answer->form);

        $path = 'pdf-viewer/web/viewer.html?file=pdfs/' . $name;
        $this->pdf_path = asset($path);

        $this->dispatch("setPDFFile", $this->pdf_path);
    }

    #[On('download')]
    public function downloadSignature()
    {
        $signature = $this->user->signature;
        if ($signature) {
            return response()->download(public_path("upload/" . $signature));
        }
    }

    public function downloadImages(Answer $solution)
    {
        $images = $solution->images;


        foreach ($images as $image) {
            $filePath = storage_path("app/public/{$image->path}");
            dd($image, $filePath, $images, file_exists($filePath));
            if (file_exists($filePath)) {
            } else {
                $this->alertMessage('لم يتم رفع الصور بطريقة صحيحة', 'error');
                return false;
            }
        }


        // Name of the zip file
        $zipFileName = 'images.zip';

        // Create a temporary file to store the zip
        $zipFilePath = storage_path('app/public/' . $zipFileName);

        $zip = new ZipArchive;

        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            // Loop through images and add them to the zip
            foreach ($images as $image) {
                $filePath = storage_path("app/public/{$image->path}");

                if (file_exists($filePath)) {
                    $name = $image->name . '.' . pathinfo($image->path, PATHINFO_EXTENSION);
                    $zip->addFile($filePath, $name);
                }
            }
            $zip->close();
        }

        // Download the zip file and delete it after download
        $this->alertMessage('جاري تحميل الصور بنجاح', 'success');
        return response()->download(storage_path('app/public/' . $zipFileName))->deleteFileAfterSend(true);
        // $this->dispatch('downloadFile', ['url' => Storage::url($zipFileName)]);
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
