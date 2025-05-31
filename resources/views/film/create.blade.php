@extends('layouts.master')
@section('title')
    Halaman Tambah Film
@endsection

@section('content')
<form method="POST" action="/film" enctype="multipart/form-data">
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
        <label for="title">Judul</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>

    <div class="form-group">
        <label for="summary">Summary</label>
        <input type="text" class="form-control" id="summary" name="summary">
    </div>

    <div class="form-group">
        <label for="release_year">Tahun Rilis</label>
        <input type="text" class="form-control" id="release_year" name="release_year">
    </div>

    <div class="form-group">
        <label for="poster">Poster</label>
        <input type="file" class="form-control" id="poster" name="poster">
    </div>

    <div class="form-group">
        <label for="genre_id">Genre</label>
        <select name="genre_id" class="form-control" id="genre_id">
            <option value="">--pilih genre--</option>
            @forelse ($genre as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @empty  
                <option value="">Tidak ada genre</option>
            @endforelse
        </select>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>
@endsection
