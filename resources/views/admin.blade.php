@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Manajemen Produk</h2>
        <a href="{{ url('/tambah') }}" class="btn btn-success"><i class="bi bi-plus-lg"></i> Tambah Produk</a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @if($dataProduk && $dataProduk->num_rows > 0)
                        @while($row = $dataProduk->fetch_assoc())
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td><span class="badge bg-secondary">{{ $row['nama_kategori'] }}</span></td>
                            <td>{{ $row['nama_produk'] }}</td>
                            <td class="text-success fw-bold">{{ $pbo->formatHarga($row['harga']) }}</td>
                            <td>
                                <a href="{{ url('/edit/' . $row['id_produk']) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i> Edit</a>
                                <a href="{{ url('/delete/' . $row['id_produk']) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus produk ini?')"><i class="bi bi-trash"></i> Hapus</a>
                            </td>
                        </tr>
                        @endwhile
                    @else
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada produk.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
