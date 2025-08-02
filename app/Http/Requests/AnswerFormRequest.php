<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnswerFormRequest extends FormRequest
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
            'answer'     => ['required', 'string', 'max:255'],
            'correct'    => ['required', 'integer', 'max:1'],
            'questionId' => ['required', 'integer', 'max:999999999'],
        ];
    }

    public function attributes()
    {
        return [
            'answer'     => 'Resposta',
            'correct'    => 'Correta',
            'questionId' => 'Pergunta',
        ];
    }
}
