<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
            'images' => 'required|array|max:10', // Максимум 10 файлов
            'images.*' => 'file|mimes:jpg,png,gif|max:2048', // Ограничение на типы и размер файлов
        ];
    }

    public function messages(): array
    {
        return [
            'images.required' => 'Необходимо выбрать хотя бы один файл.',
            'images.array' => 'Файлы должны быть загружены в виде массива.',
            'images.max' => 'Можно загрузить не более 10 файлов.',
            'images.*.file' => 'Один или несколько загруженных файлов не являются файлами.',
            'images.*.mimes' => 'Один или несколько загруженных файлов имеют недопустимый тип. Допустимые типы: jpg, png, jpeg, gif.',
            'images.*.max' => 'Один или несколько загруженных файлов превышают максимальный размер 2 МБ.',
        ];
    }
}
