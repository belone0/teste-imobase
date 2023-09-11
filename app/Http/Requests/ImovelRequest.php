<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImovelRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'integer |required',
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048 |nullable',
            'title' => 'string |required',
            'address' => 'string |required',
            'type' => 'string |required',
            'value' => 'integer |required',
        ];
    }
}
