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
            'nip' => 'required|numeric|unique:gurus,nip',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'no_telp' => 'required|numeric',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'smk_id' => 'required',
        ];
    }
}
