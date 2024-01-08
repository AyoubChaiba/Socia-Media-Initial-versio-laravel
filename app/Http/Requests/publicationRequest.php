<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class publicationRequest extends FormRequest
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
        return [
            'title' => 'required|max:150',
            'body' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:50000',
            'id_profile' => 'nullable'
        ];
    }

    public function messages() {
        return [
            'title' => 'title required',
            'body' => 'body required'
        ];
    }
}
