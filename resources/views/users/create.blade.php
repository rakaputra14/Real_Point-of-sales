@extends('layouts.admin-layout')
@extends('layouts.main')
@section('title', 'Add New Users')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add New Users</h5>
                        <form action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="col-form-label">User Name *</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Your Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Email *</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter Your Email"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Password *</label>
                                <input type="text" class="form-control" name="password" placeholder="Enter Your Pass"
                                    required>
                            </div>
                            <!-- <div class="mb-3">
                                        <label class="form-label d-block">Roles</label>
                                        @foreach ($roles as $role)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="roles[]"
                                                    value="{{ $role->id }}" id="role-{{ $role->id }}">
                                                <label class="form-check-label" for="role-{{ $role->id }}">{{ $role->name }}</label>
                                            </div>
                                        @endforeach
                                    </div> -->
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" id="role" class="form-select" required>
                                    <option disabled selected>-- Pilih Role --</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="reset" class="btn btn-danger">Cancel</button>
                                <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection