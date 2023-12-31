@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">To Do App</div>

        <div class="card-body">
          <h4>Edit Page</h4>

          <form method="post" action="{{route('todos/update')}}">
            @csrf

            @method('PUT')

            <input type="hidden" name="todo_id" value="{{$todo->id}}">

            <div class="mb-3">
              <label class="form-label">Title</label>
              <input type="text" name="title" class="form-control" value="{{$todo->title}}">

            </div>

            <div class="mb-3">
              <label class="form-label">Description</label>
              <textarea name="description" class="form-control" cols="8" rows="8">{{$todo->description}}</textarea>

            </div>
            <div class="mb-3">

              <label for="">status</label>
              <select name="is_completed" class="form-control">
                <option disable selected>Select Option</option>
                <option value="1">Completed</option>
                <option value="2">UnCompleted</option>


              </select>

            </div>

            <button type=" submit" class="btn btn-primary">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection