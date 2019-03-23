<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Student::class,30)->create()->each(function ($u){
            $u->courses()->save(factory(\App\Course::class)->make());
        });
    }
}
