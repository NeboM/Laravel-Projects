<?php

namespace App\Http\Controllers;

use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit')->with('task',$task);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'date' => 'integer|between:1,7'
        ]);

        $newTask = new Task();

        if(!empty($request['date'])){
            $newTask->date = Carbon::today()->addDays($request['date']);
        }else{
            $newTask->date = Carbon::today();
        }

        $newTask->name = $request['name'];
        $newTask->user_id = Auth::id();
        $newTask->save();
        return redirect()->back()->with('success','Task added successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'date' => 'integer|between:1,7'
        ]);

        $task = Task::findOrFail($id);

        if(!empty($request['date'])){
            $task->date = Carbon::today()->addDays($request['date']);
        }

        $task->name = $request['name'];
        $task->save();

        if(!empty($request['date'])){
            return redirect('/future')->with('success','Task updated successfully');
        }else{
            return redirect('/')->with('success','Task updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->back()->with('success','Task deleted successfully');
    }

    public function finish(){
//        $task = Task::findOrFail($id);
        $task = new Task();
        if($task->finished){
            $task->finished = false;
        }else{
            $task->finished = true;
        }
        return redirect()->back();
    }
}
