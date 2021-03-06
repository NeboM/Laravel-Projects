@extends('layouts.app')
@section('content')
    <h5 class="text-center font-weight-bold mt-3">Past Tasks</h5>
    @php
        $numberOfTasksLastWeek =  0;
        $numberOfTasksFinishedLastWeek = 0;
    @endphp
    @foreach($tasks as $task)
        @php
            $numberOfTasksLastWeek++;
        @endphp
        @if($task->finished)
            @php
                $numberOfTasksFinishedLastWeek++;
            @endphp
        @endif
    @endforeach
    <p class="text-center mt-2 text-muted"><small>You finished <span class="font-weight-bold color-custom-04 big-font">{{$numberOfTasksFinishedLastWeek}}</span>
            out of <span class="font-weight-bold big-font color-custom-04">{{$numberOfTasksLastWeek}}</span>
        tasks in the last 7 days.</small></p>
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
                            <th scope="col" class="w-25">Status</th>

                        </tr>
                    </thead>
                    <tbody>
            @endif
            <tr>
                <td scope="col" class="w-75">{{$tasks[$i]->name}}</td>
                <td scope="col" class="w-25">
                    @if($tasks[$i]->finished)
                        <span class="color-custom-02 font-weight-bold font-italic">Finished</span>
                    @else
                        <span class="font-italic color-custom-02">Not Finished</span>
                    @endif
                </td>
            </tr>
            @if( $i+1 >= count($tasks) || $tasks[$i+1]->date != $tasks[$i]->date)
                    </tbody>
                </table>
            @endif
        @endfor

    @else
        <div class="text-center">
            <p class="text-center font-weight-bold">:(</p>
        </div>

    @endif
@endsection
