@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Form Buku</h1>
    <hr>
    <form action="{{ isset($book)?route("book.update",$book):route("book.store") }}" method="POST">
        @isset($book)
            @method("PUT")
        @endisset
        @csrf
        <div class="form-group">
            <label for="kode">Kode Buku</label>
            <input type="text" class="form-control @error("kode") is-invalid @enderror" name="kode" value="{{ isset($book)?$book->kode:old("kode") }}">
            @error('kode')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-group">
            <label for="judul">Judul Buku</label>
            <input type="text" class="form-control @error("judul") is-invalid @enderror" name="judul" value="{{ isset($book)?$book->judul:old("judul") }}">
            @error('judul')
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
