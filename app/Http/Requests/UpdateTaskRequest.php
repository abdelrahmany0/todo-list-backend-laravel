<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "id"            => ['required', 'numeric', 'exists:tasks,id'],
            "name"          => ['max:255', 'min:3'],
            "description"   => ['max:255', 'min:6'],
        ];
    }
}
