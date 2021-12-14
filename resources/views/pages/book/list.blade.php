@extends('layouts.app')

@section('content')
<div class="container">
    @if (session("info"))
        <div class="alert alert-success">
            {{ session("info") }}
        </div>
    @endif
    <div class="card border-danger">
                <div class="card-header bg-primary" ><h1><center>Informasi Perpustakaan Sederhana</center></h1></div>

                <div class="card-body bg-light"><h3><center>Daftar Buku</center></h3></div>
            </div>
    <hr>
    <div class="d-flex flex-row-reverse mb-2">
        <a href="{{ route("book.create") }}" class="btn btn-success">Tambah Buku</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="10%">No.</th>
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th colspan=2 width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($Book as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->kode }}</td>
            <td>{{ $item->judul }}</td>
            <td><a href="{{ route("book.edit",$item) }}" class="btn btn-warning btn-block">Edit</a></td>
            <td><a class="btn btn-danger btn-block"
                onclick="event.preventDefault();document.getElementById('hapus-book-{{$item->id}}').submit();">Hapus</a>
                <form id="hapus-book-{{$item->id}}" action="{{ route("book.destroy",$item) }}" method="post">
                    @method("DELETE")
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
