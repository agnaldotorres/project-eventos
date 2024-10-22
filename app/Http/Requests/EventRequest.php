<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'private' => 'required|boolean',
            'description' => 'required|string',
            'cidade' => 'required|string|max:100',
            'pais' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'items' => 'array',
            'items.*.' => 'string'
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'O titulo é um dado obrigatorio',
            'date.required' => 'A data é um dado obrigatorio',
            'private.required' => 'O campo de privacidade é obrigatorio',
            'description.required' =>'A descrição do evento é obrigatoria',
            'cidade.required' =>'A cidade do evento é obrigatoria',
            'pais.required' => 'O pais do evento é obrigatorio',
            'image.image' => 'O arquivo precisa ser uma imagem',
            'image.mimes' => 'A imagem precisa ter um formato adequado: jpeg, png, jpg, gif.',
            'items.array' => 'Os itens devem ser um array',
            'items.*.string' => 'Cada item deve ser uma string'
        ];
    }

}

