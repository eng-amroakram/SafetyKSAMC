<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserService extends Controller
{
    public $model = User::class;

    public function __construct()
    {
        $this->model = new User();
    }

    public function model($id)
    {
        return User::find($id);
    }

    public function data($filters, $sort_field, $sort_direction, $paginate = 10)
    {
        return User::data()
            ->whereNot('type', 'superadmin')
            ->whereNot('id', auth()->id())
            ->filters($filters)
            ->reorder($sort_field, $sort_direction)
            ->paginate($paginate);
    }

    public function changeAccountStatus($id)
    {
        return User::changeAccountStatus($id);
    }

    public function delete($id)
    {
        return User::deleteModel($id);
    }

    public function store($data)
    {
        return User::store($data);
    }

    public function update($data, $id)
    {
        return User::updateModel($data, $id);
    }

    public function rules($id = "")
    {
        return User::getRules($id);
    }

    public function messages()
    {
        return User::getMessages();
    }
}
