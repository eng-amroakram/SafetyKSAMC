<?php

namespace App\Models;

use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    use ModelHelper;

    protected $file_path = 'images/form-images';

    protected $fillable = [
        'user_id',
        'form_id',
        'answer_id',
        'path',
        'name'
    ];

    public function getPhotoTableAttribute()
    {
        return $this->attributes['path'] ? asset('storage/' . $this->attributes['path']) : asset('assets/admin/images/no-image-available.jpg');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function form()
    {
        return $this->belongsTo(Form::class, 'form_id', 'id');
    }

    public function answer()
    {
        return $this->belongsTo(Answer::class, 'answer_id', 'id');
    }

    public function scopeStore(Builder $builder, array $data = [], $answer, $form_name)
    {
        $form = Form::where('name', $form_name)->first();

        foreach ($data as $name => $image) {
            $path = $builder->storeFile($image);
            $image = $builder->create([
                'user_id' => auth()->id(),
                'form_id' => $form->id,
                'answer_id' => $answer->id,
                'path' => $path,
                'name' => $name,
            ]);
        }

        $this->deleteLivewireTempFiles();
        return true;
    }
}
