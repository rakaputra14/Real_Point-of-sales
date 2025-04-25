@extends('layouts.admin-layout')
@section('page-title', 'Dashboard')
@section('content')
<section class="py-5 text-center bg-white rounded">
    @role ('Administrator')
    <h1>admin</h1>
    @endrole
    @role ('Pimpinan')
    <h1>Pimpinan</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Category</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Photo</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $index => $data)
                <tr>
                    <td>{{ $index += 1 }}</td>
                    <td>{{ $data->category->category_name }}</td>
                    <td>{{ $data->product_name }}</td>
                    <td>{{ $data->product_price }}</td>
                    <td>{{ $data->product_qty }}</td>
                    <td><img width="100" src="{{ asset('storage/' . $data->product_photo) }}" alt="">
                    </td>
                    <td>{{ $data->product_description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endrole
    @role ('Kasir')
    <h1>Kasir</h1>
    @endrole
</section>
@endsection
