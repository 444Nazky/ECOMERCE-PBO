@extends('layouts.app')

@section('content')
<div class="container bg-white p-4 shadow-sm rounded mt-5 mx-auto" style="max-width: 500px;">
    <h4 class="mb-3">Edit Produk</h4>
    <form method="POST" action="{{ url('/edit/' . $product['id_produk']) }}">
        @csrf
        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama" class="form-control" value="{{ $product['nama_produk'] }}" required>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <select name="id_kat" class="form-control">
                <option value="1" {{ $product['id_kategori'] == 1 ? 'selected' : '' }}>Hardware</option>
                <option value="2" {{ $product['id_kategori'] == 2 ? 'selected' : '' }}>Software</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ $product['harga'] }}" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="desc" class="form-control">{{ $product['deskripsi'] }}</textarea>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" name="update" class="btn btn-warning">Simpan Perubahan</button>
            <a href="{{ url('/admin') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
