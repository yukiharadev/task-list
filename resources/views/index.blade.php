@extends('layouts.app')

@section('title', "Task List App")

@section('content')
    <div>
        <ul>
            @foreach($tasks as $task)
                <li><a href="{{route('tasks.show',['id' => $task -> id])}}"> {{$task-> title}}</a></li>
            @endforeach
        </ul>
    </div>
@endsection