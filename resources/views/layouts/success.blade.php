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

    {{-- Membuat Styling Diluar File CSS Yang Sudah Saya Buat, Menambahkan CSS Dimanapun --}}
    {{-- Misal Kita Punya Layouts Yang Membutuhkan Styling Tapi Kita Tidak Mau Taruh Di File CSS,
        Kita Bisa Taruh Di File Blade Nya, Menggunakan @push('') Content @endpush --}}
    {{-- prepend-style Bagian Atas --}}
    @stack('prepend-style')
    {{-- Incudes (Style) --}}
    @include('includes.style')
    {{-- addon-style Bagian Bawah --}}
    @stack('addon-style')
  </head>

  <body>
    {{-- Pages Content (Home) Membuat Content Dinamis --}}
    @yield('content')

    {{-- Includes (Footer) --}}
    @include('includes.footer')

    {{-- Includes (Script) Bootstrap core JavaScript --}}
    {{-- prepend-style Bagian Atas --}}
    @stack('prepend-script')
    {{-- Incudes (Style) --}}
    @include('includes.script')
    {{-- addon-style Bagian Bawah --}}
    @stack('addon-script')
  </body>
</html>
