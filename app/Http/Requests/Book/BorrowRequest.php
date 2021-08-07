<?php


namespace App\Http\Requests\Book;


use Illuminate\Foundation\Http\FormRequest;

class BorrowRequest extends FormRequest
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
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'user_id' => 'required|numeric|exists:App\Models\User,id',
        ];
    }
}
