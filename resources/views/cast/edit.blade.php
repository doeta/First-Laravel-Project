@extends('layouts.master')
@section('title')
    Halaman Edit Cast
@endsection
@section('content')

<form method = "POST" action ="/cast/{{$casts->id}}">
    @csrf
    @method('PUT')
 @if ($errors->any())
     <div class="alert alert-danger">
         <ul>
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>
 @endif

  <div class="form-group">
    <label for="name">Nama</label>
    <input type="text" class="form-control" value="{{$casts->name}}" id="name" name="name" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="age">Age</label>
    <input type="text" class="form-control" value="{{$casts->age}}" id="age" name="age">
  </div>
  <div class="form-group">
    <label for="bio">Bio</label>
    <textarea name="bio" class="form-control" value="{{$casts->bio}}" id="bio" cols ="30" rows="10"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection