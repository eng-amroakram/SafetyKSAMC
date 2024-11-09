<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = config('data.forms.table-body');
        unset($data['monthly']['emergency_shower_eye_wash_1']);
        unset($data['monthly']['emergency_shower_eye_wash_2']);
        $data['monthly']['emergency_shower_eye_wash'] = [];
        $count = 1;

        foreach ($data as $type => $forms) {

            foreach ($forms as $form => $questions) {

                DB::table('forms')->insert([
                    'name' => $form,
                    'type' => $type,
                    'created_at' => now()
                ]);

                foreach ($questions as $question_en => $question_ar) {
                    DB::table('questions')->insert([
                        'question' => $question_en,
                        'form_id' => $count,
                        'created_at' => now()
                    ]);
                }

                $count = $count + 1;
            }
        }
    }
}
