@extends('layouts.app')

@section('title', "Task List App")

@section('content')
    <a href="{{route('tasks.create')}}">Add task</a>
    
    <div>
        <ul>
            @foreach($tasks as $task)
                <li><a href="{{route('tasks.show',['task' => $task -> id])}}"> {{$task-> title}}</a></li>
            @endforeach
            @if($tasks -> count())
                {{ $tasks -> links() }}
            @endif
        </ul>
    </div>
@endsection