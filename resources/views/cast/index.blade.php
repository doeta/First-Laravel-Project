@extends('layouts.master')
@section('title')
    Halaman Tampil Cast
@endsection
@section('content')
<a href="/cast/create" class="btn btn-sm btn-info my-3" >Create</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
        @forelse ($casts as $item)
            <tr>
                <th scope="row">{{($loop->iteration)}}</th>
                <td>{{ $item->name }}</td>
               <td>
                    <form action="/cast/{{$item->id}}" method="POST" >
                    <a href="/cast/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                    <a href="/cast/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                        @csrf
                        @method('DELETE')
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
               </td>
            </tr>
        @empty
            <p>No users</p>
        @endforelse
  </tbody>
</table>
@endsection