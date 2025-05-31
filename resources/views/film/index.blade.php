@extends('layouts.master')

@section('title', 'Halaman Tampil Film')

@section('content')
@auth
    <a href="/film/create" class="btn btn-sm btn-primary mb-4">Create</a>
@endauth

<div class="row">
    @forelse ($film as $item)    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">        <div class="card h-100">
            <div style="height: 350px; overflow: hidden; display: flex; align-items: center; justify-content: center; background-color: #f8f9fa;">
                <img src="{{ asset('image/' . $item->poster) }}" alt="" style="width: 100%; height: 100%; object-fit: contain; padding: 10px;">
            </div>
            <div class="card-body d-flex flex-column">
                <div class="mb-3">
                    <span class="badge badge-info">{{ $item->genre->name }}</span>
                    <span class="badge badge-warning">{{ $item->release_year }}</span>
                </div>
                <h3 class="card-title mb-3">{{ $item->title }}</h3>
                <p class="card-text">{{ Str::limit($item->summary, 50) }}</p>
                <div class="mt-auto">
                    <a href="/film/{{ $item->id }}" class="btn btn-secondary btn-block btn-sm">Lihat Detail</a>
                </div>

                @auth
                <div class="row mt-2">
                    <div class="col">
                        <a href="/film/{{ $item->id }}/edit" class="btn btn-info btn-block btn-sm">Edit</a>
                    </div>
                    <div class="col">
                        <form action="/film/{{ $item->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger btn-block btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                        </form>
                    </div>
                </div>
                @endauth
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <h2 class="text-center">Tidak Ada Postingan</h2>
    </div>
    @endforelse
</div>
@endsection
