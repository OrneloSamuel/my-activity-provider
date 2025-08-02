<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionFormRequest extends FormRequest
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
            'question'  => ['required', 'string', 'max:255'],
            'chapterId' => ['required', 'integer', 'max:9999999999']
        ];
    }

    public function attributes()
    {
        return [
            'question'  => 'Pergunta',
            'chapterId' => 'Capítulo',
        ];
    }
}
