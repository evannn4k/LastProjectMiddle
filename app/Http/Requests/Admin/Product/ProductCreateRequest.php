<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductCreateRequest extends FormRequest
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
            "name" => "nullable|string|max:255",
            "amount" => "required|numeric",
            "price" => "required|numeric",
            "game_id" => "required|exists:games,id",
            "category_id" => "required|exists:categories,id",
            "stock" => "required|numeric",
            "image" => "nullable|image|mimes:jpeg,jpg,png,jfif,webp,gif,svg|max:2048",
            "is_active" => "required|in:0,1"
        ];
    }
}
