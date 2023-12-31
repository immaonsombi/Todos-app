<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use Illuminate\Database\Eloquent\Model;
use App\Models\Todo;
use Illuminate\Http\Request;

class Todocontroller extends Controller
{
  public function index()
  {

    $todos = Todo::all();
    return view('todos/index', [

      'todos' => $todos
    ]);
  }

  public function create()
  {
    return view('todos/create');
  }

  public function store(TodoRequest $request)

  {


    Todo::create([
      'title' => $request->title,
      'description' => $request->description,
      'is_completed' => 0
    ]);
    $request->session()->flush('alert-success', 'Todo Created Successfully');

    return to_route('todos/index');
  }

  public function show($id)
  {
    $todo = Todo::find($id);
    if (!$todo) {

      request()->session()->flush('error', 'unable to find the Todo');
      return to_route('todos/index')->withErrors([
        'error' => 'The requested cannot be found.'
      ]);
    }

    return view('todos/show', ['todo' => $todo]);
  }

  public function edit($id)
  {
    $todo = Todo::find($id);
    if (!$todo) {

      request()->session()->flush('error', 'unable to find the Todo');
      return to_route('todos/index')->withErrors([
        'error' => 'The requested cannot be found.'
      ]);
    }

    return view('todos/edit', ['todo' => $todo]);
  }

  public function update(TodoRequest $request)
  {
    //
    $todo = Todo::find($request->todo_id);
    if (!$todo) {
      request()->session()->flush('error', 'unable to find the Todo');
      return to_route('todos/index')->withErrors([
        'error' => 'The requested cannot be found.'
      ]);
    }
    $todo->update([
      'title' => $request->title,
      'description' => $request->description,
      'is_completed' => $request->is_completed
    ]);
    request()->session()->flush('alert-info', 'Todo created successfully');

    return to_route('todos/index');
  }

  public function destroy(Request $request)
  {

    $todo = Todo::find($request->todo_id);
    if (!$todo) {
      request()->session()->flush('error', 'unable to find the Todo');
      return to_route('todos/index')->withErrors([
        'error' => 'The requested cannot be found.'
      ]);
    }

    $todo->delete();
    request()->session()->flush('alert-success', 'Todo deleted successfully');

    return to_route('todos/index');
  }
}
