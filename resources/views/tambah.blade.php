@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <form method="POST" action="{{ url('/tambah') }}" class="p-4 border shadow mx-auto bg-white rounded" style="max-width: 500px;">
        @csrf
        <h4 class="mb-4">Tambah Produk</h4>
        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama Produk" required>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <select name="id_kat" class="form-control">
                <option value="1">Hardware</option>
                <option value="2">Software</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" placeholder="Harga" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="desc" class="form-control" placeholder="Deskripsi"></textarea>
        </div>
        <button type="submit" name="simpan" class="btn btn-primary w-100 mt-2">Simpan</button>
        <a href="{{ url('/admin') }}" class="btn btn-secondary w-100 mt-2">Batal</a>
    </form>
</div>
@endsection
