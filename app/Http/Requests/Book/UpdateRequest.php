<?php


namespace App\Http\Requests\Book;


use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'sometimes|string',
            'publish_date' => 'sometimes|date',
            'author_id' => 'sometimes|numeric|exists:App\Models\Author,id',
            'category_id' => 'sometimes|numeric|exists:App\Models\Category,id',
            'status' => 'sometimes|numeric'
        ];
    }
}