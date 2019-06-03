@extends('layouts.app')
@section('content')
    <h5 class="text-center font-weight-bold mt-3">Future Tasks</h5>
    <small><p class="text-center color-custom-02">Add new tasks for the future</p></small>
    <form class="max-width mt-3" action="{{route('task.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="input-group">
            <input class="form-control first w-50" type="text" placeholder="Task name" name="name">
            <select class="form-control w-25 custom-width" name="date">
                @for($i = 1; $i <= 7; $i++)
                    <option value="{{ $i }}">
                        {{\Carbon\Carbon::today()->addDays($i)->format('Y-m-d')}}
                    </option>
                @endfor
            </select>
            <input type="submit" value="Submit task" class="btn btn-custom second">
        </div>
    </form>

    @if(count($tasks) > 0)
        @php
            $dates = array();
        @endphp
        @for($i = 0; $i < count($tasks); $i++)
            @if(!in_array($tasks[$i]->date,$dates))
                <p class="text-center mt-5 font-weight-bold">{{$tasks[$i]->date}}</p>
                @php
                    array_push($dates,$tasks[$i]->date);
                @endphp
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th scope="col" class="w-75">Task Name</th>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">#</th>

                    </tr>
                    </thead>
                    <tbody>
                    @endif
                    <tr>
                        <td scope="col" class="w-75">{{$tasks[$i]->name}}</td>
                        <td class="text-center"><a href="task/{{$tasks[$i]->id}}/edit" class="fas"><i class="fas fa-pen-square"></i></a></td>
                        <td>
                            <form action="{{action('TasksController@destroy',['id'=>$tasks[$i]->id])}}" method="POST" class="text-center">
                                @csrf
                                @method('DELETE')
                                <button class="delete" type="submit"><i class="fas fa-trash-alt color-custom-02"></i></button>
                            </form>
                        </td>
                    </tr>
                    @if( $i+1 >= count($tasks) || $tasks[$i+1]->date != $tasks[$i]->date)
                    </tbody>
                </table>
            @endif
        @endfor
    @else

    @endif
@endsection