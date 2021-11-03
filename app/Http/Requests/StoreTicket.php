<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicket extends FormRequest
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
            'type' => 'required|numeric',
            'name' => 'required|max:255',
            'photo' => 'nullable',
            'remark' => 'required|string',
            'URL' => 'required|string',
            'madeBy' => 'required|numeric',
            'status' => 'required|numeric',
        ];
    }
}
