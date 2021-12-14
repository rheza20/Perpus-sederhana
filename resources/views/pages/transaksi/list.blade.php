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

                <div class="card-body bg-light"><h3><center>Daftar Transaksi</center></h3></div>
            </div>
    <hr>
    <div class="d-flex flex-row-reverse mb-2">
        <a href="{{ route("transaksi.create") }}" class="btn btn-success">Buat Transaksi</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>ID</th>
                <th>Nama</th>
                <th>No.HP </th>
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th>Tgl.Pinjam</th>
                <th>Tgl.Kembali</th>
                <th>Status</th>
                <th colspan=2 width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($Transaksi as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->tag_id }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->hp }}</td>
            <td>{{ $item->kode_buku }}</td>
            <td>{{ $item->jdl_buku }}</td>
            <td>{{ $item->pinjam }}</td>
            <td>{{ $item->kembali }}</td>
            <td>{{ $item->status }}</td>
            <td><a href="{{ route("transaksi.edit",$item) }}" class="btn btn-warning btn-block">Rubah</a></td>
            <td><a href="#" class="btn btn-danger"
                onclick="event.preventDefault();
                document.getElementById('hapus-transaksi-{{ $item->id }}').submit();">Hapus</a>
                <form id="hapus-transaksi-{{ $item->id }}" action="{{ route("transaksi.destroy",$item) }}" method="post">
                    @method("DELETE")
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <hr>
</div>
@endsection
