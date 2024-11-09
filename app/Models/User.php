<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use ModelHelper;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'job_number',
        'id_number',
        'job_title',
        'signature',
        'type',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function scopeData($query)
    {
        return $query->select([
            'id',
            'name',
            'job_number',
            'id_number',
            'job_title',
            'signature',
            'type',
            'password',
        ]);
    }

    public function scopeFilters(Builder $builder, array $filters = [])
    {
        $filters = array_merge([
            'search' => '',
        ], $filters);

        $builder->when($filters['search'] != '', function ($query) use ($filters) {
            $query
                ->where('name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('job_number', 'like', '%' . $filters['search'] . '%')
                ->orWhere('id_number', 'like', '%' . $filters['search'] . '%');
        });
    }

    public function scopeGetRules(Builder $builder, $id = "")
    {
        return [
            'name' => ['required'],
            'job_number' => ['required', 'unique:users,job_number'],
            'id_number' => ['required', 'unique:users,id_number'],
            'job_title' => ['required'],
            'password' => ['required']
        ];
    }

    public function scopeGetMessages()
    {
        return [
            'name.required' => 'هذا الحقل مطلوب',
            'job_number.required' => 'هذا الحقل مطلوب',
            'job_number.unique' => 'رقم الموظف موجود بالفعل',
            'id_number.required' => 'هذا الحقل مطلوب',
            'id_number.unique' => 'رقم الهوية موجود بالفعل',
            'job_title.required' => 'هذا الحقل مطلوب',
            'password.required' => 'هذا الحقل مطلوب',
        ];
    }

    public function scopeStore(Builder $builder, array $data = [])
    {
        $user = $builder->create($data);

        if ($user) {
            return true;
        }

        return false;
    }

    public function scopeUpdateModel(Builder $builder, $data, $id)
    {

        if ($data["password"]) {
            $data["password"] = Hash::make($data["password"]);
        } else {
            unset($data["password"]);
        }

        $user = $builder->find($id);

        if ($user) {
            $user = $user->update($data);
            return true;
        }

        return false;
    }

    public function forms()
    {
        return $this->hasMany(Form::class, 'user_id', 'id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'user_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'user_id', 'id');
    }

}
