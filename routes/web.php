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
        $p->create($request->input('id_kat'), $request->input('nama'), $request->input('harga'), $request->input('desc'));
        return redirect('/admin');
    }
    $title = "Tambah Produk - PBO";
    return view('tambah', compact('title'));
});

Route::match(['get', 'post'], '/edit/{id}', function (Request $request, $id) {
    $pbo = new Product();
    if ($request->isMethod('post')) {
        $pbo->update($id, $request->input('id_kat'), $request->input('nama'), $request->input('harga'), $request->input('desc'));
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
