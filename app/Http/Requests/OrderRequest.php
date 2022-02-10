<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Dto\OrderCreateDto;

class OrderRequest extends FormRequest
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
            'name' => 'required|max:255|regex:/^(?:\w+\s){2,}(?:\w+\s*)$/iu',
            'comment' => 'nullable|max:255',
            'article' => 'required|max:255',
            'manufacturer' => 'required|max:255',
        ];
    }

    public function getDto(): OrderCreateDto
    {
        $name = explode(' ', $this->name);
        $lastName   = $name[0] ?? '';
        $firstName  = $name[1] ?? '';
        $patronymic = $name[2] ?? '';

        return new OrderCreateDto(
            $lastName,
            $firstName,
            $patronymic,
            $this->get('comment'),
            $this->get('article'),
            $this->get('manufacturer')
        );
    }
}
