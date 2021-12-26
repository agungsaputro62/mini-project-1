@extends('layouts.admin')

@section('title')
    Dashboard Admin Product
@endsection

@section('content')
<div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Dashboard Admin Product</h2>
                <p class="dashboard-subtitle">
                  List Products
                </p>
              </div>
              <div class="dashboard-content">
                  <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('product.create') }}" class="btn btn-primary mb-3">
                                + Tambah Product Baru
                                </a>
                                <div class="table-responsive">
                                    {{-- crudTable => Untuk Menginisiasi Dari DataTables --}}
                                    <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                        {{-- Table thead --}}
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Pemilik</th>
                                                <th>Kategori</th>
                                                <th>Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
@endsection

@push('addon-script')
{{-- Menggunakan Ajax --}}
        <script>
            var datatable = $('#crudTable').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: {
                    url: '{!! url()->current() !!}',
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    // Akselarasi, Jadi Di Data Table Itu, Untuk Mengakses Data Akselarasi Kita Bisa Pakai Simbol .
                    {data: 'user.name', name: 'user.name'},
                    {data: 'category.name', name: 'category.name'},
                    {data: 'price', name: 'price'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searcable: false,
                        width: '15%'
                    },
                ]
                })
        </script>
@endpush
