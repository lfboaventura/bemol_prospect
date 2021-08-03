<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest

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
        $data = parent::all();

        $rules = [
            'name'                  => 'required|string|max:100',
            'lastName'              => 'required|string|max:100',
            'birthday'              => 'required|date',
            'genre'                 => [
                'required',
                Rule::in('M', 'F', 'O'),
            ],
            'cpf'                   => 'required|string|max:20',
            'rg'                    => 'max:50',
            'zip_code'              => 'required|string|max:10',
            'address'               => 'required|string|max:100',
            'number'                => 'required|string|max:20',
            'neighborhood'          => 'max:50',
            'complement'            => 'max:100',
            'state'                 => 'required|string|max:2',
            'city'                  => 'required|string|max:50',
            'phone'                 => 'max:15',
            'cell_phone'            => 'max:15',
        ];


        if (Auth::check()) {
            if (isset($data['password'])) {
                $rule_aux = [
                    'password'  => 'required|string|max:100|min:1|confirmed',
                ];
                $rules = array_merge($rules, $rule_aux);
            }
        } else {
            $rule_aux = [
                // 'email'     => ['required', Rule::unique('users')->ignore(Auth::user()->id)],
                'email'     => 'required|string|email|max:100|unique:users',
                'password'  => 'required|string|max:100|min:1|confirmed',
            ];
            $rules = array_merge($rules, $rule_aux);
        }


        return $rules;
    }
}
