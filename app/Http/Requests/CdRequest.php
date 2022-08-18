<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CdRequest extends FormRequest
{
    public function rules()
    {
        return [
            'file.sample' => 'required|mimes:txt,csv',
            'file.sample2' => 'nullable|mimes:txt,csv',
            'file.sample3' => 'nullable|mimes:txt,csv',
            'file.blank' => 'required|mimes:txt,csv',
        ];
    }
}
