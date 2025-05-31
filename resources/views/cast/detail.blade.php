@extends('layouts.master')
@section('title')
    Halaman Detail Cast
@endsection
@section('content')
<h1 class= "text-primary">{{$casts->name}}</h1>
<p>{{$casts->age}}</p>
<p>{{$casts->bio}}</p>
@endsection
