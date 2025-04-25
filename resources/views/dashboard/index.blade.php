@extends('layouts.admin-layout')
@section('page-title', 'Dashboard')
@section('content')
<section class="py-5 text-center bg-white rounded">
    @role ('Administrator')
    <h1>admin</h1>
    @endrole
    @role ('Pimpinan')
    <h1>Pimpinan</h1>
    @endrole
    @role ('Kasir')
    <h1>Kasir</h1>
    @endrole
</section>
@endsection
