<?php

namespace App\Livewire\Admin\Panel;

use App\Http\Controllers\Services\Services;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    use LivewireAlert;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    protected $service = null;

    public $pagination = 10;
    public $sort_field = 'id';
    public $sort_direction = 'asc'; // desc

    public $search = "";
    public $filters = [];

    public $name = "";
    public $job_number = "";
    public $job_title = "";
    public $id_number = "";
    public $password = "";
    public $model_id = "";


    private function setService()
    {
        return Services::createInstance("UserService") ?? new Services();
    }

    #[Title('لوحة التحكم - الموظفين'), Layout('layouts.admin.app')]
    public function render()
    {
        $this->filters["search"] = $this->search;

        $service = $this->setService();
        $users = $service->data($this->filters, $this->sort_field, $this->sort_direction, $this->pagination);

        return view('livewire.admin.panel.users', [
            'users' => $users
        ]);
    }

    public function delete($id)
    {
        $service = $this->setService();
        $message = $service->delete($id);
        $this->alertMessage($message, 'success');
    }

    public function addUser()
    {
        $service = $this->setService();

        $data = [
            "name" => $this->name,
            "job_number" => $this->job_number,
            "job_title" => $this->job_title,
            "id_number" => $this->id_number,
            'type' => 'employee',
            "password" => Hash::make($this->password),
        ];

        $rules = $service->rules();
        $messages = $service->messages();
        $validator = Validator::make($data, $rules, $messages);
        $errors = array_map(fn($value) => $value[0], $validator->errors()->toArray());

        if (count($errors)) {
            $this->dispatch('create-errors', $errors);
            $this->alertMessage('يرجى التأكد من إدخال البيانات', 'error');
            return false;
        }

        $user = $service->store($data);

        if ($user) {
            $this->alertMessage('تم تسجيل البيانات بنجاح', 'success');
            $this->dispatch('process-has-been-done');
            $this->reset();
            return true;
        }

        $this->alertMessage('حدث خطأ اثناء تسجيل بياناتك', 'error');
        return false;
    }

    public function editUser()
    {
        $service = $this->setService();

        $data = [
            "name" => $this->name,
            "job_number" => $this->job_number,
            "job_title" => $this->job_title,
            "id_number" => $this->id_number,
            "password" => $this->password,
        ];

        $rules = $service->rules();
        $messages = $service->messages();
        $rules['job_number'] = ['required',];
        $rules['id_number'] = [];
        unset($rules['password']);
        $validator = Validator::make($data, $rules, $messages);
        $errors = array_map(fn($value) => $value[0], $validator->errors()->toArray());

        if (count($errors)) {
            $this->dispatch('create-errors', $errors);
            $this->alertMessage('يرجى التأكد من إدخال البيانات', 'error');
            return false;
        }

        $user = $service->update($data, $this->model_id);

        if ($user) {
            $this->alertMessage('تم تسجيل البيانات بنجاح', 'success');
            $this->dispatch('process-has-been-done');
            $this->reset();
            return true;
        }

        $this->alertMessage('حدث خطأ اثناء تسجيل بياناتك', 'error');
        return false;
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

    public function openModal($id)
    {
        $user = User::where('id', $id)->first();
        $this->model_id = $id;
        $this->name = $user->name;
        $this->job_number = $user->job_number;
        $this->job_title = $user->job_title;
        $this->id_number = $user->id_number;
    }
}
