<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
            'title' => ['required', 'min:3', 'max:255', Rule::unique('posts')->ignore($this->post)],
            'body' => 'nullable',
            'image' => 'nullable|url',


        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'il titolo deve avere almeno :min caratteri',
            'title.max' => 'il titolo deve avere almeno :max caratteri',
            'title.unique' => 'il titolo esiste già',
            'image.url' => 'Devi inserire un aurl valida'



        ];
    }
}
