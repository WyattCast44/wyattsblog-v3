<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255', 'unique:posts,title'],
            'tags' => ['nullable', 'string'],
            'excerpt' => ['required', 'string', 'max:512'],
            'content' => ['required', 'string'],
        ];
    }

    public function hasTags()
    {
        return $this->tags != null;
    }
}
