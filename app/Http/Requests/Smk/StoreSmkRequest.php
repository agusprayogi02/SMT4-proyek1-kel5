<?php

namespace App\Http\Requests\Smk;

use Illuminate\Foundation\Http\FormRequest;

class StoreSmkRequest extends FormRequest
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
            'npsn' => 'required|numeric|unique:smks,npsn',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'no_telp' => 'required|numeric',
            'kepala_sekolah' => 'required|string',
        ];
    }
}
