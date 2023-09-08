<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImovelRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'photo'=>'image|mimes:jpeg,png,jpg|max:2048',
            'title'=>'string',
            'address'=>'string',
            'type'=>'string',
            'value'=>'integer',
            'owner'=>'string',
        ];
    }
}
