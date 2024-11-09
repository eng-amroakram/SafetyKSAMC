<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Form;
use App\Models\User;
use Illuminate\Http\Request;

class FormService extends Controller
{
    public function store($solution, $form_name)
    {
        $user = User::find(auth()->id());

        $solution['name_ar'] = $user->name;
        $solution['inspector_name'] = $user->name;
        $solution['signature_image'] = $user->signature;
        $solution['date'] = now()->format('Y-m-d');
        $form = Form::where('name', $form_name)->first();

        if(in_array($form_name, ["direct_status_report", 'daily_tour']))
        {
            $solution['time'] =  now()->format('h:i:s');
            $solution['day'] =  now()->format('D');
        }

        $answer = Answer::create([
            'user_id' => $user->id,
            'form_id' => $form->id,
            'solutions' => $solution,
            'notes' => $solution['notes'] ?? ''
        ]);

        return $answer;
    }
}
