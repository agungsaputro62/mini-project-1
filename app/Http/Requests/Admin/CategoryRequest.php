<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // Form Request Adalah Salah Satu Cara Membuat Validasi Dalam Controller Kita, Kita Tidak Perlu
            // Membuat Validasi Di Setiap Fungsi, Kita Bisa Lebih Enak Menggunakan Form Request Karena Kita
            // Bisa Di Create, Edit (Tanpa Bikin Validasi Satu Per Satu)

            // Roles Field
            'name' => 'required|string',
            'photo' => 'required|image'
        ];
    }
}