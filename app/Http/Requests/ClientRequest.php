<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'document_type' => 'required',
            'document_number' => 'required|alpha_num',
            'passport' => 'nullable|alpha_num',
            'first_name' => 'required',
            'last_name' => 'required',
            'born_date' => 'required',
            'gender' => 'required',
            'phone' => 'nullable'
        ];
    }
}
