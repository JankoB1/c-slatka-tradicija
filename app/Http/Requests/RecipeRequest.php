<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeRequest extends FormRequest
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
            'userEmail' => 'required|string|max:50',
            'userName' => 'required|string|max:50',
            'publicName' => 'int',
            'category' => 'nullable|exists:categories|id',
            'title' => 'required|max:100|string',
            'difficulty' => 'required|string',
            'preparationTime' => 'required|string',
            'ingredients' => 'required|string',
            'description' => 'nullable|string',
            'preparationDescription' => 'required|string',
            'additionalDescription' => 'required|string'
        ];
    }
}
