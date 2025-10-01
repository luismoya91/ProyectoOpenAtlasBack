<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'name' => 'sometimes|string',
            'description' => 'sometimes|string',
            'status_id' => 'sometimes|exists:statuses,id,type,"Project",active,1',
            'start_date' => 'sometimes|date',
            'end_date' => 'sometimes|date',
            'active' => 'sometimes',
            'users' => 'sometimes|array',
            'users.*' => 'sometimes|exists:users,id',
            'fee_id' => 'sometimes|integer|exists:fees,id,active,1',
            'tasks' => 'required|array',
            'tasks.*' => 'required|exists:tasks,id,active,1'
        ];
    }
}
