<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'mata_pelajaran' => 'required',

        ];
    }
    public function messages(): array
    {
        return [
            'mata_pelajaran.required' => 'Gagal Tambah Data, Nama Mata Pelajaran wajib diisi',
        ];
    }
}
