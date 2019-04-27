@extends('layouts.app')
@section('content')

    @if(!empty($task) && $task->date >= \Carbon\Carbon::today()->format('Y-m-d'))
        <h3 class="text-center mt-5 font-weight-bold">Update Task</h3>
        <h5 class="text-center mt-3 font-weight-bold font-italic"><small><span class="color-custom-02 font-weight-bold">{{$task->date}}</span></small></h5>

        <form class="max-width" action="{{action('TasksController@update',['id'=>$task->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="input-group">
                @if($task->date > \Carbon\Carbon::today())
                    <input class="form-control first w-50" type="text" placeholder="Task name" name="name"  value="{{$task->name}}">
                        <select class="form-control w-25 custom-width" name="date">
                            @for($i = 1; $i <= 7; $i++)
                                <option value="{{ $i }}" {{$task->date == \Carbon\Carbon::today()->addDays($i)->format('Y-m-d') ? 'selected' : ''}}>
                                    {{\Carbon\Carbon::today()->addDays($i)->format('Y-m-d')}}
                                </option>
                            @endfor
                        </select>
                    <input type="submit" value="Update Task" class="btn btn-secondary second">
                @else
                    <input class="form-control first" type="text" placeholder="Task name" name="name"  value="{{$task->name}}">
                    <input type="submit" value="Update Task" class="btn btn-secondary second">
                @endif


            </div>
        </form>
    @else
        <h3 class="text-center mt-5">Task not found <span class="color-custom-01 font-weight-bold">:(</span></h3>
    @endif



@endsection