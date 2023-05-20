<?php

namespace App\Http\Requests\Guru;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuruRequest extends FormRequest
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
            'nip' => 'required|unique:guru,nip',
            'nama' => 'required|string|max:60',
            'alamat' => 'required|string|max:200',
            'no_telp' => 'required|string|max:15',
            'email' => 'required|email|unique:guru,email',
            'password' => 'required',
        ];
    }
}
