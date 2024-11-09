<?php

namespace App\Livewire\Admin\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{
    use LivewireAlert;

    public $job_number = '';
    public $password = '';

    public function mount() {}

    #[Layout('layouts.admin.login', ['headerTitle' => 'لوحة التحكم - تسجيل الدخول']), Title('Control Panel - Login')]
    public function render()
    {
        return view('livewire.admin.auth.login');
    }

    #[On('submitting-login-data')]
    public function submit()
    {
        $user = User::where('job_number', $this->job_number)->first();

        if ($user) {
        if (Hash::check($this->password, $user->password)) {
                Auth::login($user);
                return redirect()->route('admin.panel.index');
            }

            $this->dispatch('admin-db-login-validation', ["password" => "Check the password"]);
            return "";
        }

        $this->dispatch('admin-db-login-validation', ["email" => "Check the email or phone number"]);
        return "";
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
