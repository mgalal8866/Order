<?php

namespace App\Http\Requests;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'client_fhonewhats' => 'required|unique:users',
            'client_name'       => 'required|string|max:50',
            'client_fhoneLeter' => '',
            'client_code' => '',
            'region_id'         => 'required',
            'lat_mab'           => 'required',
            'long_mab'          => 'required',
            'client_state'      => 'required',
            'CategoryAPP'       => 'required',

        ];

        // switch ($this->method()) {
        //     case 'GET':
        //     case 'DELETE':{
        //             return [];
        //         }
        //     case 'POST':{
        //             return [
        //                 'name'=> 'unique:users'
        //             ];
        //         }
        //     case 'PUT':{
        //             return [
        //                 'title' => 'string|unique:posts|required',
        //                 'body'  => 'required',
        //                 'image' => 'string|nullable',

        //             ];
        //         }
        // }
    }
    public function messages()
    {
        return [
            'client_name.required'      => 'الاسم مطلوب',
            'client_fhonewhats.unique'  => 'رقم الهاتف مسجل مسبقا',
            'client_fhoneLeter.required'=> '',
            'region_id.required'        => 'المحافظة مطلوبة',
            'lat_mab.required'          => 'required',
            'long_mab.required'         => 'required',
            'client_state.required'     => 'required',
            'CategoryAPP.required'      => 'required',
        ];
    }
    public function failedValidation(Validator $validator)

    {

        throw new HttpResponseException(response()->json($validator->errors(), 422));
        // throw new HttpResponseException(Resp($validator->errors(),'', 422));

    }
}
