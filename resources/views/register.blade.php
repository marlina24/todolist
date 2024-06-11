@extends('layouts.app')


@section('content')

<h1>Inscription</h1>

<div class="w-50 m-auto">
<form method=post action="/register">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Prenom</label>
        <input name="prenom" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nom</label>
      <input name="nom" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
      <input name="password" type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
