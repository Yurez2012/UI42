<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexCityRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'search' => [
                'string',
                'nullable',
            ],
        ];
    }
}
