<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubSolutionRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'icon' => 'nullable',
            'image' => 'nullable',
            'description' => 'required',
            'detail' => 'required',
            'slug' => 'required',
            'seoTitle' => 'nullable',
            'seoDescriptions' => 'nullable',
            'seoKeywords' => 'nullable'
        ];
    }
}
