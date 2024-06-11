@extends('layouts.app')

@section('content')

<h1 class="text-center">Modifier une tâche</h1>

<div class="m-auto">
  <form method='post' action="{{ route('task.update', $task->id) }}" enctype='multipart/form-data'>
    @csrf
    <div class="mb-3">
      <label for="titre" class="form-label">Titre</label>
      <input required type="text" value="{{ $task->titre}}"  name="titre" class= "form-control" id="titre" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea required name='description' class="form-control" id="description" rows="3">{{ $task->description}}</textarea>
    </div>

    <div class="mb-3">
        <label for="end" class="form-label">Date de fin</label>
        <input required value="{{ $task->date_fin}}" type="date" name='date_fin' class="form-control" id="end" rows="3"></input>
    </div>

    <input type="submit" class="btn btn-primary" />
  </form>
</div>

@endsection