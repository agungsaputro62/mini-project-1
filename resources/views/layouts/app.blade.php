<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    {{-- Judul Halaman Dinamis --}}
    <title>@yield('title')</title>

    {{-- Kasih Styling Di Luar CSS Yang Sudah Saya Buat, Makanya Saya Siapkan Untuk Bagian @stack('name')
    Dengan @stack('name') => Kita Bisa Menambahkan CSS Dimanapun, Kita Disini Kasusnya Menambahkan Bagian Atas Dan Bawah
    Kedepannya Misalkan Kita Punya Layouts Yang Membutuhkan Syling Tapi Tidak Mau Taruh Di File CSS, Kita Bisa Taruh
    Langsung Di Blade Nya, Dengan Cara Kita Bisa Panggil @push('name') Content @endpush , Maka Kita Akan Mengisi
    --}}
    @stack('prepend-style')

    {{-- Includes Style --}}
    @include('includes.style')

    {{-- Style Bagian Bawah --}}
    @stack('addon-style')
  </head>

  <body>
    {{-- Includes Navbar --}}
    @include('includes.navbar')

    {{-- Pages Content --}}
    @yield('content')

    {{-- Includes Footer --}}
    @include('includes.footer')

    {{-- Script Bagian Atas --}}
    @stack('prepend.script');

    {{-- Includes Script - Bootstrap core JavaScript --}}
    @include('includes.script')

    {{-- Script Bagian Bawah --}}
    @stack('addon-script')

  </body>
</html>
