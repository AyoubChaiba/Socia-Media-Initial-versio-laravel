<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class profileRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $rules =  [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:profiles,email' ,
            'password' => 'required|min:8|max:50|confirmed' ,
            'bio' => 'nullable',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:50000'
        ];
        if(isset($this->profile)){
            $rules['email'] .= ',' . $this->profile->id;
        }
        return $rules ;
    }
}
