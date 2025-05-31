@extends('layouts.master')
@section('title', 'Tambah Genre')

@section('content')
<form method="POST" action="{{ route('genre.store') }}">
    @csrf

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
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
@endsection
