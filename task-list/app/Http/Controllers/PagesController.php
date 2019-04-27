<?php

namespace App\Http\Controllers;

use App\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{


    public function  today(){
        $tasks = Task::where([
            ['date','=',Carbon::now()->format('Y-m-d')],
            ['user_id','=',Auth::id()]

        ])->orderBy('created_at','desc')->get();
        return view('pages.today')->with('tasks',$tasks);
    }

    public function  future(){
        $date = Carbon::today()->addDays(7);
        $tasks = Task::where([
            ['date','<=', $date],
            ['date','>',Carbon::today()],
            ['user_id','=',Auth::id()]
        ])->orderByRaw('date ASC, created_at DESC')->get();
        return view('pages.future')->with('tasks',$tasks);
    }

    public function  history(){
        $date = Carbon::today()->subDays(7);
        $tasks = Task::where([
            ['date','>=', $date],
            ['date', '<', Carbon::today()],
            ['user_id','=',Auth::id()]
        ])->orderByRaw('date DESC, created_at DESC')->get();
        return view('pages.history')->with('tasks',$tasks);
    }

    public function finished($id){
        $task = Task::findOrFail($id);
        if($task->date == Carbon::today()->format('Y-m-d')){
            if($task->finished){
                $task->finished = FALSE;
            }else{
                $task->finished = TRUE;
            }
            $task->save();
            return redirect()->back();
        }else{
            return abort(404);
        }
    }
}
