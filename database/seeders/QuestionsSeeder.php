<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            'Client’s reviews',
            'Professional Team',
            'Best Services',
        ];

        foreach ($questions as $question) {
            DB::table('questions')->insert([
                'question' => $question,
            ]);
        }
    }
}
