<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
    public function rules()
    {
        // Retrieve the ID from the route parameters
        $id = $this->route('id');

        return [
            'title' => 'required|string|max:50|unique:todos,title,' . $id,
            'description' => 'required|string',
        ];
    }
}
