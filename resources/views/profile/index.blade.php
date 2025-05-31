@extends('layouts.master')
@section('title')
    Halaman Update Profile
@endsection

@section('content')
<form action="/profile/{{ $detailProfile->id }}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
        <label>Name user</label>
        <input type="text" value="{{$detailProfile->user->name}}" class="form-control" disabled>
    </div>

    <div class="form-group">
        <label>Email user</label>
        <input type="email" value="{{$detailProfile->user->email }}" class="form-control" disabled>
    </div>

    <div class="form-group">
        <label>Age</label>
        <input type="number" name="age" value="{{ $detailProfile->age }}" class="form-control">
    </div>
    @error('age')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Bio</label>
        <textarea name="bio" class="form-control" cols="30" rows="10">{{ $detailProfile->bio }}</textarea>
    </div>
    @error('bio')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection