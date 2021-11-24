<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreUser extends FormRequest
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
         static $rules_save = [
        'name' => ['required','string','max:255'],
        'email' => ['required','string','email:rfc,dns','max:255','unique:users','regex:/^[A-Za-z0-9.]*@(bastruks|basworld)[.](com)+$/'],
        'password' => ['required','string','min:8','confirmed']
         ];
        return $rules_save;
    }

    public function failedValidation(Validator $validator)
    {

        if (url()->current() == config('app.externalconnection')."/user") 
        {
            throw new HttpResponseException(back()->withInput()->with('errors',  $validator->errors()));      
        }else {
            throw new HttpResponseException( response()->view('errors.9000', [
                'errors' => $validator->errors()
            ]));
//            throw new HttpResponseException(view('errors.9000')->with('errors',  $validator->errors()));
//            return abort('9000');
//            throw new HttpResponseException(response()->json([
//                'success'   => false,
//                'message'   => 'Validation errors',
//                'data'      => $validator->errors()
//            ]));
        }
    }
}
