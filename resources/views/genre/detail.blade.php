@extends('layouts.master')

@section('title')
    Detail Genre
@endsection

@section('content')
    <h1 class="text-primary">{{ $genre->nama }}</h1>
    <p class="card-text">{{ $genre->summary }}</p>

    <h3 class="mt-4">Film dengan Genre Ini:</h3>
    <div class="row">
        @forelse ($genre->film as $film)
            <div class="col-4">
                <div class="card">
                    <img src="{{asset('image/'.$film->poster) }}" height="250px" class="card-img-top" alt="{{ $film->title }}">
                    <div class="card-body">
                        <h3>{{ $film->title }}</h3>
                        <p class="card-text">{{ Str::limit($film->summary, 50) }}</p>
                        <p class="card-text">Tahun Rilis: {{ $film->release_year }}</p>
                        <a href="/film/{{ $film->id }}" class="btn btn-secondary btn-block btn-sm">Read More</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada film dalam genre ini.</p>
        @endforelse
    </div>

    <a href="/genre" class="btn btn-secondary btn-sm mt-3">Kembali</a>
@endsection
