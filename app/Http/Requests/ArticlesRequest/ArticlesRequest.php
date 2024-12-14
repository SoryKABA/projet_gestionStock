<?php

namespace App\Http\Requests\ArticlesRequest;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Articles;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ArticlesRequest extends FormRequest
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
            'title' => ['required', 'min:6'],
            'slug' => ['required', 'regex:/^[a-z0-9\-]+$/', Rule::unique('articles')->ignore($this->route()->parameter('article'))],
            'price' => 'required',
            'category_id' => 'required',
            // 'description' => ['string', 'regex:/^[a-z0-9\-]+$/'],
            'image' => [Rule::requiredIf((new Articles)->image)],
            'quantity' => ['required', 'integer'],
            'peremption' => 'date'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => $this->input('slug') ?: Str::slug($this->input('title'))
        ]);
    }
}