<?php

namespace App\Http\Requests\Album;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AlbumCreateRequest extends FormRequest
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
            'banda_id' => 'required|exists:bandas,id',
            'fecha' => ['required', 'integer'],
            'duracion' => 'required|date_format:H:i:s',
            'imagen' => ['image', 'required','mimes:jpeg,jpg,png', 'max:10240']
        ];
    }
}

            