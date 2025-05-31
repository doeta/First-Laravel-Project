@extends('layouts.master')
@section('title')
    Halaman detail Film
@endsection
@section('content')
<div class="container">
    <div class="row">        <!-- Kolom Kiri - Informasi Film -->
        <div class="col-md-4">
            <div style="width: 350px; height: 350px; overflow: hidden; margin-bottom: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 8px;">
                <img src="{{asset('image/'.$film->poster) }}" class="img-fluid" alt="" style="width: 100%; height: 100%; object-fit: contain; background-color: #f8f9fa;">
            </div>
        </div>
        
        <!-- Kolom Kanan - Detail dan Review -->
        <div class="col-md-8">
            <h1 class="mb-4">{{ $film->title }}</h1>
            <p class="card-text">{{ $film->summary }}</p>
            <p class="card-text"><strong>Tahun Rilis:</strong> {{ $film->release_year }}</p>
            <p class="card-text"><strong>Genre:</strong> {{ $film->genre->name }}</p>

            <hr>

            <h4>List Review</h4>
            @forelse ($film->reviews as $item)            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <img src="https://dummyimage.com/50/09f.png/fff" class="rounded-circle me-3" width="50px" height="50px" alt="user avatar">
                        <div>
                            <h5 class="card-title text-primary mb-1">{{$item->user->name}}</h5>
                            <p class="card-text">{{$item->content}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <h4>Belum ada Review</h4>            @endforelse
            
            <form action="/review/{{$film->id}}" method="post" class="mt-4">
                @csrf
                <div class="form-group">
                    <textarea name="content" class="form-control" placeholder="Tulis review Anda di sini..." rows="5"></textarea>
                    @error('record')
                        <div class="alert alert-danger mt-2">
                            {{message}}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Kirim Review</button>
            </form>
            
            <div class="mt-4">
                <a href="/film" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
