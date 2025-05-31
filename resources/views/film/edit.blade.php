@extends('layouts.master')
@section('title')
    Halaman Tambah Film
@endsection

@section('content')
<form method="POST" action="/film/{{ $film->id }}" enctype="multipart/form-data">
    @csrf
    @method('put')

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
        <input type="text" class="form-control" value="{{ $film->title }}" id="title" name="title">
    </div>

    <div class="form-group">
        <label for="summary">Summary</label>
        <input type="text" class="form-control" id="summary" name="summary" value="{{ $film->summary }}">
    </div>

    <div class="form-group">
        <label for="release_year">Tahun Rilis</label>
        <input type="text" class="form-control" value="{{ $film->release_year }}" id="release_year" name="release_year">
    </div>    <div class="form-group">
        <label for="poster">Poster</label>
        @if($film->poster)
        <div style="width: 350px; height: 350px; overflow: hidden; margin-bottom: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 8px;">
            <img src="{{ asset('image/' . $film->poster) }}" alt="Current Poster" style="width: 100%; height: 100%; object-fit: contain; background-color: #f8f9fa;">
        </div>
        @endif
        <input type="file" class="form-control" id="poster" name="poster">
    </div>

    <div class="form-group">
        <label for="genre_id">Genre</label>
        <select name="genre_id" class="form-control" id="genre_id">
            <option value="">--pilih genre--</option>
            @forelse ($genre as $item)
                <option value="{{ $item->id }}" 
                    @if ($item->id == $film->genre_id) selected @endif>
                    {{ $item->name }}
                </option>
            @empty  
                <option value="">Tidak ada genre</option>
            @endforelse
        </select>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>
@endsection
