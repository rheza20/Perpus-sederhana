@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Form Transaksi</h1>
    <hr>
    <form action="{{ isset($transaksi)?route("transaksi.update",$transaksi):route("transaksi.store") }}" method="POST">
        @isset($transaksi)
            @method("PUT")
        @endisset
        @csrf
        <div class="form-group">
            <label for="tag_id">ID</label>
            <input type="text" class="form-control @error("tag_id") is-invalid @enderror" name="tag_id" value="{{ isset($transaksi)?$transaksi->tag_id:old("tag_id") }}">
            @error('tag_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control @error("nama") is-invalid @enderror" name="nama" value="{{ isset($transaksi)?$transaksi->nama:old("nama") }}">
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="hp">No.HP</label>
            <input type="text" class="form-control @error("hp") is-invalid @enderror" name="hp" value="{{ isset($transaksi)?$transaksi->hp:old("hp") }}">
            @error('hp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="kode_buku">Kode Buku</label>
            <select name="kode_buku" id="kode_buku" class="form-control @error("kode_buku") is-invalid @enderror">
            @foreach ($book as $item)
                <option value="{{ $item->kode }}" {{ isset($transaksi) && $transaksi->kode_buku==$item->kode_buku?"selected":"" }}>{{ $item->kode }}</option>
            @endforeach
            </select>
            @error('kode_buku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="jdl_buku">Judul Buku</label>
            <select name="jdl_buku" id="jdl_buku" class="form-control @error("jdl_buku") is-invalid @enderror">
            @foreach ($book as $item)
                <option value="{{ $item->judul }}" {{ isset($transaksi) && $transaksi->jdl_buku==$item->jdl_buku?"selected":"" }}>{{ $item->judul }}</option>
            @endforeach
            </select>
            @error('jdl_buku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="pinjam">Tgl. Pinjam</label>
            <input type="date" class="form-control @error("pinjam") is-invalid @enderror" name="pinjam" value="{{ isset($transaksi)?$transaksi->pinjam:old("pinjam") }}">
            @error('pinjam')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="kembali">Tgl. Kembali</label>
            <input type="date" class="form-control @error("kembali") is-invalid @enderror" name="kembali" value="{{ isset($transaksi)?$transaksi->kembali:old("kembali") }}">
            @error('kembali')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control @error("status") is-invalid @enderror" name="status" value="{{ isset($transaksi)?$transaksi->status:old("status") }}">
            @error('status')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <input type="submit" value="Simpan" class="btn btn-success">
        </div>
    </form>
</div>
@endsection
