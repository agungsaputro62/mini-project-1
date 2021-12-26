@extends('layouts.admin')

@section('title')
    Dashboard Admin Edit User
@endsection

@section('content')
<div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Dashboard Admin Edit User</h2>
                <p class="dashboard-subtitle">
                Edit User
                </p>
              </div>
              <div class="dashboard-content">
                  <div class="row">
                    <div class="col-md-12">

                <!-- Error Handling Dari Bawaan Laravel -->
@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                        <div class="card">
                            <div class="card-body">
                                {{-- Mengupdate Berdasarkan ID --}}
                                <form action="{{ route('user.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                    {{-- Update Data Menggunakan PUT --}}
                                    @method('PUT')

                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>
                                                    Nama User
                                                </label>
                                                {{-- Data Sebelumnya Sudah Tersimpan Menggunakan $item->name --}}
                                                <input type="text" name="name" class="form-control" required value="{{ $item->name }}">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                        <div class="form-group">
                                                <label>
                                                    Email User
                                                </label>
                                                {{-- Data Sebelumnya Sudah Tersimpan Menggunakan $item->email --}}
                                                <input type="email" name="email" class="form-control" required value="{{ $item->email }}">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                        <div class="form-group">
                                                <label>
                                                    Password User
                                                </label>
                                                <input type="password" name="password" class="form-control">
                                                {{-- Kasih Kondisi --}}
                                                <small>Kosongkan Jika Tidak Ingin Mengganti Password</small>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                        <div class="form-group">
                                                <label>
                                                    Roles
                                                </label>
                                                <select name="roles" required class="form-control">
                                                    {{-- Kalian Tidak Mengubah Apa2 Berarti Kalian Masih Pakai Field Sebelumnya --}}
                                                    <option value="{{ $item->roles }}" selected>Tidak Diganti</option>
                                                    <option value="ADMIN">Admin</option>
                                                    <option value="USER">User</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="row">
                                            <div class="col text-right">
                                                <button type="submit" class="btn btn-success px-5">
                                                    Save Now
                                                </button>
                                            </div>
                                        </div>
                                </form>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
@endsection
