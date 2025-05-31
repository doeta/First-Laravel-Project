@extends('layouts.master')
@section('title', 'Edit Genre')

@section('content')
<form method="POST" action="{{ route('genre.update', $genre->id) }}">
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
        <label for="name">Nama Genre</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $genre->name }}" required>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Perbarui</button>
</form>
@endsection
