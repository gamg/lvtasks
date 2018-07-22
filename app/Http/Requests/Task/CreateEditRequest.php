<?php

namespace Taskapp\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class CreateEditRequest extends FormRequest
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
            'description' => 'required|max:255',
            'category_id' => 'required|exists:categories,id'
        ];
    }
}
