<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'file' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|in:article,news,tutorial',
            'publish_date' => 'nullable|date',
        ];
    }
    public function message(): array
    {
        return [
            'file' => 'seuls les images sont accepter',
            'file' => 'la taille maximun est de 2048kb',
            'title' => 'les extensions autoriser sont (jpg,jpeg,png,svg)',
            'description' => 'le champ est requis',
            'category' => 'le champ est requis',
            'publish_date' => 'veillez choisir la date|nullable|date',
        ];
    }
}
