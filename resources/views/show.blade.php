@extends('layouts.app')

@section('title', "Task: $task->title")

@section('content')
    <p>{{ $task->title }}</p>
    <p>{{ $task->description }}</p>
    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>
    <a href="{{ route('tasks.index') }}">Back</a>
@endsection