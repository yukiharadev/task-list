<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->get()
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create')->name('tasks.create');

Route::get("/tasks/{id}", function ($id) {

    return view('show', [
        'task' => Task::findOrFail($id)
    ]);

})->name('tasks.show');

Route::post('/tasks', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();


    return redirect()->route('tasks.show', ['id' => $task->id])->with('success', 'Task Created!');

})->name('tasks.store');


//Error Router 404
//Route::fallback(function () {
//    return "404 Not Found";
//});
