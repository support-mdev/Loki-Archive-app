<?php

namespace App\Http\Requests;

// use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreListingRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'source' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'category' => 'required|string',
        'origin' => 'required|string',
        'contact' => 'required|string',
        'website' => 'required|url', 
        'tags' => 'required|string',
        'description' => 'required|string',
        ];
    }
}
