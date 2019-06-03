<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProgressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_progresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('current_streak')->default(0);
            $table->integer('max_streak')->default(0);
            $table->enum('tasks_per_day',['1','3','5','8'])->default('3');
            /*
                 a) If the difference between last_streak_update and today's date is more than 1
                    set day_streak to 0

                 b) Update last_streak_update to today's date when day_streak is updated
            */
            $table->date('last_streak_update')->default(date('Y-m-d'));
            // Use `updated` column to check if current_streak is already updated
            $table->boolean('updated')->default(false);
        });

        // When User creates account we insert a row for him in the user_progress table
        // to track his progress
        DB::unprepared('
        CREATE TRIGGER add_user_progresses_row AFTER INSERT ON `users` FOR EACH ROW
            INSERT INTO user_progresses (`user_id`) VALUES (NEW.id);
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_progresses');
        DB::unprepared('DROP TRIGGER `add_user_progresses_row`');
    }
}

