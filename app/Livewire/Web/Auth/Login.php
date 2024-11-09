<?php

namespace App\Livewire\Web\Auth;

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
    public $job_number = '';
    public $password = '';

    #[Layout('layouts.web.app'), Title('Control Panel - Login')]
    public function render()
    {
        return view('livewire.web.auth.login');
    }

    #[On('submitting-login-data')]
    public function submit()
    {
        $user = User::where('job_number', $this->job_number)->first();

        if ($user) {
            if (Hash::check($this->password, $user->password)) {
                Auth::login($user);
                if (in_array($user->type, ['superadmin', 'admin'])) {
                    return redirect()->route('admin.panel.index');
                }
                return redirect()->route('web.home');
            }

            $this->dispatch('admin-db-login-validation', ["password" => "تأكد من كلمة المرور"]);
            return "";
        }

        $this->dispatch('admin-db-login-validation', ["email" => "تأكد من الرقم الوظيفي"]);
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
