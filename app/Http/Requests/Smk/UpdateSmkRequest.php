<?php

namespace App\Http\Requests\Smk;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSmkRequest extends FormRequest
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
            'npsn' => 'required|numeric',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'email' => 'required|email',
            'no_telp' => 'required|numeric',
            'kepala_sekolah' => 'required|string',
        ];
    }
}
