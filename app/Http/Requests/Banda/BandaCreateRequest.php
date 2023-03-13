<?php

namespace App\Http\Requests\Banda;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BandaCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|max:255',
            'integrantes' => 'required|max:255',
            'descripcion' => 'required',
            'genero_id' => 'required',
            'imagen' => ['image', 'required','mimes:jpeg,jpg,png', 'max:10240']
        ];
    }
}
