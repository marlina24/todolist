@extends('layouts.app')

@section('content')
<h1>Gestion des tâches</h1>

<table>
  <thead>
    <tr>
      <th style="width: 70px">État</th>
      <th>Titre</th>
      <th style="width: 123px">Date Limite</th>
      <th style="width: 170px">Actions</th>
    </tr>
  </thead>
  <tbody>
@foreach ($tasks as $task)
    @if($task->statut == 0)
    <tr style="background-color: #93faa1">
    @elseif($task->date_fin < date('Y-m-d'))
    <tr style="background-color: #f5f782">
    @else
    <tr>
    @endif
      <td class="text-center">
        @if($task->statut)
          <input type="checkbox" disabled>
        @else
          <input type="checkbox" checked disabled>
        @endif
      </td>
      <td>{{ $task->titre }} - {{ $task->description }}</td>
      <td class="text-center">
        {{ $task->date_fin }}
        @if($task->date_fin < date('Y-m-d'))
          ({{ date_diff(date_create($task->date_fin), date_create(date('Y-m-d')))->format('%a') }} jours)
        @endif
      </td>
      <td class="text-center">
        <span><a href="/edit-task/{{ $task->id }}"><i style="" class="fa-solid fa-edit task-icon"></i></a></span>
        <span><a href="/delete-task/{{ $task->id }}"><i style="color:red" class="fa-solid fa-trash task-icon"></i></a></span>
        
        <span><a href="/task-statut/{{ $task->id }}/{{ $task->statut }}">
          @if($task->statut)
          <i style="color:green" class="fa-solid fa-check task-icon"></i>
          @else
          <i style="color:red" class="fa-solid fa-times task-icon"></i>
          @endif
        </a></span>
      </td>
    </tr>
@endforeach
  </tbody>
</table>

@endsection
