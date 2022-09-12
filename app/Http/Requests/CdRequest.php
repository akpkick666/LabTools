<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CdRequest extends FormRequest
{
    public function rules()
    {
        return [
            'sample.sample1' => 'required|mimes:txt,csv',
            'sample.sample2' => 'nullable|mimes:txt,csv',
            'sample.sample3' => 'nullable|mimes:txt,csv',
            'blank.blank' => 'required|mimes:txt,csv',
        ];
    }
}
