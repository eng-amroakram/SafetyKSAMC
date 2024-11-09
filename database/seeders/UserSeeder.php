<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        #Admin
        User::create([
            'name' => "شروق عبدالله السحيمي",
            'job_number' => "30571",
            'id_number' => "",
            'job_title' => "مديرة النظام",
            'type' => 'superadmin',
            'password' => Hash::make("Aw1410"),
        ]);

        User::create([
            'name' => "عمرو اكرم اسعد",
            'job_number' => "599916672",
            'id_number' => "405236530",
            'job_title' => "مديرة النظام",
            'type' => 'superadmin',
            'password' => Hash::make("599916672"),
        ]);

        $employees = config('data.users');


        foreach ($employees as $job_number => $employee) {
            User::create([
                'name' => $employee['name'],
                'job_number' => $job_number,
                'id_number' => $employee['id_number'],
                'job_title' => $employee['job_title'],
                'type' => 'employee',
                'password' => Hash::make("123456"),
            ]);
        }
    }
}
