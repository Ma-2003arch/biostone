<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:jpeg,png,jpg,pdf,doc,docx|max:2048',
            'category' => 'required|in:article,news,tutorial',
            'publish_date' => 'nullable|date',
           
        ];
    }
}