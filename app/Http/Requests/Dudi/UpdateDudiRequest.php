<?php

namespace App\Http\Requests\Dudi;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDudiRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nib' => 'required|string|max:50',
            'email' => 'required|string|max:100',
            'nama' => 'required|string|max:80',
            'nama_pemilik' => 'required|string|max:50',
            'alamat' => 'required|string|max:200',
            'no_telp' => 'required|string|max:15',
            'kuota' => 'required|integer',
            'keahlian' => 'required|array'
        ];
    }
}
