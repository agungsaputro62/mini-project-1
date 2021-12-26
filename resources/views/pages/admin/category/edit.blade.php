@extends('layouts.admin')

@section('title')
    Dashboard Admin Edit Category
@endsection

@section('content')
<div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Dashboard Admin Edit Category</h2>
                <p class="dashboard-subtitle">
                Edit Category
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
                                <form action="{{ route('category.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                    {{-- Update Data Menggunakan PUT --}}
                                    @method('PUT')

                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label>
                                                    Nama Kategori
                                                </label>
                                                {{-- Data Sebelumnya Sudah Tersimpan Menggunakan $item->name --}}
                                                <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>
                                                    Foto
                                                </label>
                                                {{-- Tidak Bikin Required, Karena Gambar Tidak Bisa Masukkin Dalam Value
                                                    Jadi Gambar Akan Di Update Jika Orang Tersebut Mau Update / Tidak Wajib Di Upload
                                                    --}}
                                                <input type="file" name="photo" class="form-control">
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
