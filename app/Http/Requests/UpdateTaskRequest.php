<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['name' => "string", 'status_id' => "string"])] public function rules(): array
    {
        return [
            'name' => 'filled|unique:tasks,name|string|min:1|max:255',
            'status_id' => 'filled|string|exists:statuses,id'
        ];
    }
}

