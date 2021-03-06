<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
    public function rules(): array
    {
        $file = $this->isMethod('POST') ? 'required' : 'nullable';
        $name = $this->isMethod('POST') ? 'nullable' : 'required';

        return [
            'name' => "$name|string",
            'file' => "$file|mimes:jpeg,jpg,png,doc,docx,pdf,xls,xlsx|max:2048",
            'model'  => "$file|string",
        ];
    }
}