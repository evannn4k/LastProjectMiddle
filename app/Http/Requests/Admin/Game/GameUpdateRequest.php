<?php

namespace App\Http\Requests\Admin\Game;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GameUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return (Auth::guard('admin')->check()) ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|string|max:255",
            "region" => "required|string|max:255",
            "publisher" => "required|string|max:255",
            "is_active" => "required|in:0,1",
            "description" => "required|string",
            "image" => "nullable|image|mimes:jpeg,jpg,png,jfif,webp,gif,svg|max:2048"
        ];
    }
}
