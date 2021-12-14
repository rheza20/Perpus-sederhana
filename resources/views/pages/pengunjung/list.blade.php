@extends('layouts.app')
{{-- @extends('layouts/app.blade.php') --}}

@section('content')
<div class="container">
    @if (session("info"))
        <div class="alert alert-success">
            {{ session("info") }}
        </div>
    @endif
    <div class="card border-danger">
                <div class="card-header bg-primary" ><h1><center>Informasi Perpustakaan Sederhana</center></h1></div>

                <div class="card-body bg-light"><h3><center>Daftar Pengunjung</center></h3></div>
            </div>
    <hr>
    <div class="d-flex flex-row-reverse mb-2">
        <a href="{{ route("pengunjung.create") }}" class="btn btn-success">Tambah Pengunjung</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Email</th>
                <th colspan=2 class="w-25">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($Pengunjung as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->ID }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->telepon }}</td>
            <td>{{ $item->email }}</td>
            <td><a href="{{ route("pengunjung.edit",$item) }}"
                class="btn btn-warning btn-block">Edit</a></td>
            
            <td>
                <a class="btn btn-danger btn-block"
                    onclick="event.preventDefault();document.getElementById('hapus-pengunjung-{{$item->id}}').submit();">Hapus</a>
                <form id="hapus-pengunjung-{{$item->id}}" action="{{ route("pengunjung.destroy",$item) }}" method="post">
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
