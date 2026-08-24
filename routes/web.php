<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

require_once base_path('classes/Product.php');

Route::get('/', function () {
    $pbo = new Product();
    $dataProduk = $pbo->read();
    $title = "Nazkuy";
    return view('index', compact('dataProduk', 'title', 'pbo'));
});

Route::get('/admin', function () {
    $pbo = new Product();
    $dataProduk = $pbo->read();
    $title = "Seller Center - SMK Pedia";
    return view('admin', compact('dataProduk', 'title', 'pbo'));
});

Route::match(['get', 'post'], '/tambah', function (Request $request) {
    if ($request->isMethod('post')) {
        $p = new Product();

        $newId = $p->create(
            $request->input('id_kat'),
            $request->input('nama'),
            $request->input('harga'),
            $request->input('desc')
        );

        // upload gambar opsional -> simpan sebagai {id_produk}.jpg
        if ($request->hasFile('gambar') && $request->file('gambar')->isValid() && $newId) {
            $file = $request->file('gambar');
            $targetPath = public_path('assets/img/' . $newId . '.jpg');
            $file->move(public_path('assets/img'), $newId . '.jpg');
        }

        return redirect('/admin');
    }
    $title = "Tambah Produk - PBO";
    return view('tambah', compact('title'));
});

Route::match(['get', 'post'], '/edit/{id}', function (Request $request, $id) {
    $pbo = new Product();

    if ($request->isMethod('post')) {
        $pbo->update(
            $id,
            $request->input('id_kat'),
            $request->input('nama'),
            $request->input('harga'),
            $request->input('desc')
        );

        // upload gambar opsional -> simpan sebagai {id_produk}.jpg
        if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
            $file = $request->file('gambar');
            $file->move(public_path('assets/img'), $id . '.jpg');
        }

        return redirect('/admin');
    }

    $product = $pbo->getById($id);
    $title = "Edit Produk - PBO";
    return view('edit', compact('product', 'title'));
});

Route::get('/delete/{id}', function ($id) {
    $pbo = new Product();
    $pbo->delete($id);
    return redirect('/admin');
});

Route::get('/produk/{id}', function ($id) {
    $pbo = new Product();
    $product = $pbo->getById($id);
    $title = $product['nama_produk'] ?? 'Produk';

    return view('produk', compact('product', 'title', 'pbo'));
});

Route::get('/produk', function () {
    $pbo = new Product();
    $dataProduk = $pbo->read();
    $title = 'Semua Produk';

    return view('produk_list', compact('dataProduk', 'title', 'pbo'));
});
