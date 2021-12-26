<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Memanggil Eloquent SoftDeletes
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    // Intinya Fungsi Model Adalah Untuk Menyimpan Data Dan Mempermudah Kita Masukkin $fillable Agar Kita
    // Bisa Simpan Menggunakan Cara Miss Assessment Di Laravel

    // Menggunakan SoftDeletes
    use SoftDeletes;

    // Field2 Apa Saja Yang Bisa Saya Kirim Untuk Saya Simpan Datanya Menggunakan Miss Assessment
    // Miss Assessment => Saya Akan Pakai Di Semua CRUD Saya, Jadi Tidak Perlu Menentukan Lagi Nama2 Fieldnya
    // Saat Save, Kalian Cukup Kasih Variable Dengan Isi Arrray Dengan Nama Field Yang Sesuai
    // Tambahkan Dulu Sebelum Bisa Menyimpan Data Tersebut Dengan Miss Assessment, Kita Masukkin Field2 Yang Mau
    // Kita Save (Yang Otomatis Terisi Tidak Perlu Di Isi)
    protected $fillable = [
        'name',
        'photo',
        'slug'
    ];

    // Kita Ga Akan Pakai Tapi Kita Ketikkan Saja
    // Kita Mau Munculkan Field Tersebut Disaat Kalian Memanggil Model Tersebut Yaudah Kasih $hidden Aja,
    // Lalu Masukkin Kesini, Kalian Tidak Mau Munculin photo Disaat Kalian Memanggil Model Category, Kalian Bisa
    // Masukkin Di protected $hidden
    protected $hidden = [

    ];
}