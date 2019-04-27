@extends('layouts.app')
@section('content')
    <h5 class="text-center font-weight-bold font-italic mt-3">{{Carbon\Carbon::today()->format('l')}}</h5>
    <small><p class="text-center color-custom-02">Add new task for today</p></small>
    <form class="max-width" action="{{route('task.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="input-group">
            <input class="form-control first" type="text" placeholder="Task name" name="name">
            <input type="submit" value="Submit Task" class="btn btn-secondary second">
        </div>
    </form>

    @if(count($tasks) > 0)
        @php
            $countUnfinishedTasks = 0;
        @endphp
        @foreach($tasks as $task)
            @php
                if($task->finished == false)
                    $countUnfinishedTasks++;
            @endphp
        @endforeach
        <p class="text-center font-weight-bold mt-5">{{Carbon\Carbon::today()->format('Y-m-d')}}</p>
        @if($countUnfinishedTasks == 0)
            <p class="text-center"><span class="color-custom-01 font-weight-bold">Congratulations!</span> You've finished all your tasks for today.</p>
        @else
            <p class="text-center"><span class="color-custom-01 font-weight-bold">{{$countUnfinishedTasks}}</span> tasks left for today!</p>
        @endif

        <table class="table table-bordered table-striped  mt-5">
            <thead>
            <tr>
                <th scope="col" class="w-75">Task Name</th>
                <th scope="col" class="w-25">Status</th>
                <th scope="col" class="w-25 text-center">#</th>
                <th scope="col" class="w-25 text-center">#</th>
            </tr>
            </thead>
            <tbody>

        @foreach($tasks as $task)

            <tr>
                <td>{{$task->name}}</td>
                <td>
                    @if($task->finished)
                        <a href="/finished/{{$task->id}}" class="no-underline"><span class="color-custom-01 font-weight-bold font-italic">Finished</span></a>
                    @else
                        <a href="/finished/{{$task->id}}" class="no-underline"><span class="font-italic color-custom-02">Not Finished</span></a>
                    @endif
                </td>
                <td><a href="task/{{$task->id}}/edit" class="fas"><i class="fas fa-pen-square"></i></a></td>
                <td><form action="{{action('TasksController@destroy',['id'=>$task->id])}}" method="POST" class="text-center">
                        @csrf
                        @method('DELETE')
                        <button class="delete" type="submit"><i class="fas fa-trash-alt"></i></button>
                    </form></td>
            </tr>
        @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center mt-5 font-weight-bold">No tasks for today...</p>
        <p class="text-center font-weight-light">{{Carbon\Carbon::today()->format('Y-m-d')}}</p>
    @endif





@endsection