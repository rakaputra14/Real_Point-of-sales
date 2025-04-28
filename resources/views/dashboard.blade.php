@extends('layouts.admin-layout')
@section('page-title', 'Dashboard')
@section('content')
<section class="py-5 text-center bg-white rounded">
    @role ('Administrator')
    <h1>Welcome Administrator</h1>
    @endrole
    @role ('Pimpinan')
    <h1>Stok Produk</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kategori</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $index => $data)
                <tr>
                    <td>{{ $data->category->category_name }}</td>
                    <td>{{ $data->product_name }}</td>
                    <td>{{ $data->product_price }}</td>
                    <td>{{ $data->product_qty }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endrole
    @role ('Kasir')
    <h1>Stok Produk</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kategori</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $index => $data)
                <tr>
                    <td>{{ $data->category->category_name }}</td>
                    <td>{{ $data->product_name }}</td>
                    <td>{{ $data->product_price }}</td>
                    <td>{{ $data->product_qty }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endrole
</section>
@endsection