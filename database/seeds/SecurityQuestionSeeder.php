<?php

use App\SecurityQuestion;
use Illuminate\Database\Seeder;

class SecurityQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SecurityQuestion::create(['question' => 'What was the name of the street you lived on as a child?']);
        SecurityQuestion::create(['question' => 'What primary school did you attend?']);
        SecurityQuestion::create(['question' => 'In what city or town was your first job?']);
        SecurityQuestion::create(['question' => 'What was the make of your first car?']);
        SecurityQuestion::create(['question' => 'What is your oldest cousin\'s first name?']);
    }
}
