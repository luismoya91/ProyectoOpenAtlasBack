<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'required|string',
            'status_id' => 'required|exists:statuses,id,type,"Project"',
            'start_date' => 'required|date',
            'end_date' => 'sometimes|date',
            'active' => 'sometimes',
            'users' => 'required|array',
            'users.*' => 'required|exists:users,id',
            'fee_id' => 'required|integer|exists:fees,id',
            'tasks' => 'required|array',
            'tasks.*' => 'required|exists:tasks,id'
        ];
    }
}
