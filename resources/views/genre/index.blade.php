@extends('layouts.master')

@section('title', 'Daftar Genre')

@section('content')
@auth
<a href="{{ route('genre.create') }}" class="btn btn-primary mb-4">Tambah Genre</a>
@endauth

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Genre</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($genres as $key => $genre)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $genre->name }}</td>
                <td>
                    <a href="/genre/{{ $genre->id }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('genre.edit', $genre->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <!-- Form untuk Delete -->
                    <form action="{{ route('genre.destroy', $genre->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus genre ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">Tidak ada genre tersedia.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
