@extends('layouts.app')

@section('content')
<div class="container">
    @if (session("info"))
        <div class="alert alert-success">
            {{ session("info") }}
        </div>
    @endif
    <h1>Form Pengunjung</h1>
    <hr>
    <form action="{{ isset($pengunjung)?route("pengunjung.update",$pengunjung):route("pengunjung.store") }}" method="post">
        @isset($pengunjung)
            @method("PUT")
        @endisset
        @csrf
        <div class="form-group">
            <label for="ID">ID</label>
            <input type="text" class="form-control @error("ID") is-invalid @enderror" name="ID" value="{{ isset($pengunjung)?$pengunjung->ID:old("ID") }}">
            @error('ID')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control @error("nama") is-invalid @enderror" name="nama" value="{{ isset($pengunjung)?$pengunjung->nama:old("nama") }}">
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control @error("alamat") is-invalid @enderror" name="alamat" value="{{ isset($pengunjung)?$pengunjung->alamat:old("alamat") }}">
            @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="telepon">Telepon</label>
            <input type="text" class="form-control @error("telepon") is-invalid @enderror" name="telepon" value="{{ isset($pengunjung)?$pengunjung->telepon:old("telepon") }}">
            @error('telepon')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control @error("email") is-invalid @enderror" name="email" value="{{ isset($pengunjung)?$pengunjung->email:old("email") }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group float-right">
            <input type="submit" value="Simpan" class="btn btn-success">
        </div>
    </form>
</div>
@endsection
