<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageService extends Controller
{
    public $model = Image::class;

    public function __construct()
    {
        $this->model = new Image();
    }

    public function model($id)
    {
        return Image::find($id);
    }

    public function data($filters, $sort_field, $sort_direction, $paginate = 10)
    {
        return Image::data()
            ->whereNot('type', 'superadmin')
            ->whereNot('id', auth()->id())
            ->filters($filters)
            ->reorder($sort_field, $sort_direction)
            ->paginate($paginate);
    }

    public function changeAccountStatus($id)
    {
        return Image::changeAccountStatus($id);
    }

    public function delete($id)
    {
        return Image::deleteModel($id);
    }

    public function store($data, $answer, $form_name)
    {
        return Image::store($data, $answer, $form_name);
    }

    public function update($data, $id)
    {
        return Image::updateModel($data, $id);
    }

    public function rules($id = "")
    {
        return Image::getRules($id);
    }

    public function messages()
    {
        return Image::getMessages();
    }
}
