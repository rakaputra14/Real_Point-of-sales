@extends('layouts.admin-layout')

@section('page-title', 'Dashboard')

@section('content')
<section class="py-5 text-center bg-white rounded shadow-sm">
    @role('Administrator')
    <h1 class="mb-4 fw-bold">Welcome Administrator</h1>
    @endrole

    @role('Pimpinan')
    <h1 class="mb-4 fw-bold">Stok Produk</h1>
    @include('partials.product-table', ['datas' => $datas])
    @endrole

    @role('Kasir')
    <h1 class="mb-4 fw-bold">Stok Produk</h1>
    @include('partials.product-table', ['datas' => $datas])
    @endrole
</section>
@endsection