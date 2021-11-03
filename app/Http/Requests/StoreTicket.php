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
            'type' => 'required|numeric|min:1|max:5',
            'name' => 'required|max:255',
            'photo' => 'nullable|string|max:255',
            'remark' => 'required|string',
            'URL' => 'sometimes|required|string',
            'madeBy' => 'sometimes|required|numeric',
            'status' => 'required|numeric',
            'developer' => 'nullable',
            'priority' => 'nullable|numeric|min:1|max:3'
        ];
    }
}
