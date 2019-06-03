<?php

namespace App\Http\Controllers;
use App\UserProgress;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class GoalController extends Controller
{
    use UpdateCurrentStreakTrait;

    public function noob(){
         $userProgress = UserProgress::where('user_id',Auth::user()->id)->first();
        $userProgress->tasks_per_day = '1';
        $userProgress->save();
        UpdateCurrentStreakTrait::update();
        return redirect()->back();
    }

    public function normal(){
        $userProgress = UserProgress::where('user_id',Auth::user()->id)->first();
        $userProgress->tasks_per_day = '3';
        $userProgress->save();
        UpdateCurrentStreakTrait::update();
        return redirect()->back();
    }

    public function pro(){
        $userProgress = UserProgress::where('user_id',Auth::user()->id)->first();
        $userProgress->tasks_per_day = '5';
        $userProgress->save();
        UpdateCurrentStreakTrait::update();
        return redirect()->back();
    }

    public function master(){
        $userProgress = UserProgress::where('user_id',Auth::user()->id)->first();
        $userProgress->tasks_per_day = '8';
        $userProgress->save();
        UpdateCurrentStreakTrait::update();
        return redirect()->back();
    }
}
