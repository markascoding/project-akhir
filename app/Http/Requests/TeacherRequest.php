<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'nip' => 'required',
            'nama_guru' => 'required',
            'email' => ['required', 'email', Rule::unique('teachers', 'email')->ignore($this->teacher)],
        ];
    }
    public function messages()
    {
        return [
            'nip.required' => 'Gagal Tambah Data, NIP wajib diisi',
            'nama_guru.required' => 'Gagal Tambah Data, Nama Guru wajib diisi',
            'email.required' => 'Gagal Tambah Data, Email wajib diisi',
            'email.email' => 'Gagal Tambah Data, Format email salah',
            'email.unique' => 'Gagal Tambah Data, Email sudah digunakan',
        ];
    }
}
