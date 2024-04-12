<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnusRequest extends FormRequest
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
        return
            [
                'name' => 'required',
                'nisn' => 'required',
                'id_tahun' => 'required',
                'j_kelamin' => 'required',
                'tmpt_lahir' => 'required',
                'tgl_lahir' => 'required',
                'phone_num' => 'required',
                'alamat' => 'required',
                'foto' => 'required',
                'password' => 'required',
                'lnjt_sklh' => 'required',
            ];
    }
}
