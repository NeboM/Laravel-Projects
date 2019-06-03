<?php

namespace App\Http\Controllers;
use App\UserProgress;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

trait UpdateCurrentStreakTrait
{

    /* WORKS WITH user_progresses TABLE /*
     *
     *  Updates current_streak and max_streak and tracks users progress with updated column
     *
     */
    public static function update(){
        $userProgress = UserProgress::where('user_id','=',Auth::id())->first();
        $finishedTasksNumberForToday = Auth::user()->tasks->where('date','=',Carbon::today()->format('Y-m-d'))->where('finished','=',1)->count();

        if($finishedTasksNumberForToday < $userProgress->tasks_per_day){
            if($userProgress->updated == 1){
                $userProgress->updated = 0;
                $userProgress->last_streak_update = Carbon::yesterday()->format('Y-m-d');
                $userProgress->current_streak--;
            }
        }else if($userProgress->updated == 0){
            $userProgress->updated = 1;
            $userProgress->last_streak_update = Carbon::now()->format('Y-m-d');
            $userProgress->current_streak++;
        }
        if($userProgress->current_streak > $userProgress->max_streak){
            $userProgress->max_streak = $userProgress->current_streak;
        }
        $userProgress->save();
    }


    public static function controlDayStreak(){
        $userProgress = UserProgress::where('user_id',Auth::id())->first();
        $date01 = new \DateTime($userProgress->last_streak_update);
        $date02 = new \DateTime(Carbon::now()->format('Y-m-d'));
        $interval = $date01->diff($date02);
        $days = $interval->format('%a');

        if($days >= 2){
            $userProgress->last_streak_update = Carbon::now()->format('Y-m-d');
            $userProgress->current_streak = 0;
            $userProgress->updated = false;
        }
        if($days == 1){
            $userProgress->updated = false;
        }
        $userProgress->save();

    }
}
