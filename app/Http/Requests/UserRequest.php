<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => ['required', 'regex:/^[a-zA-Z\s]*$/'], 
            'npm' => ['required', 'numeric'], 
            'kelas_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nama.required' => 'Nama harus diisi.',
            'nama.regex' => 'Nama hanya boleh mengandung huruf dan spasi.',
            'npm.numeric' => 'NPM harus berupa angka.',
        ];
    }   

}
