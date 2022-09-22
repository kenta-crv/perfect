<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizCreationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $data = $this->all();
        $category = $data['quiz_category_id'];
        $rules = [];
        switch ($category) {
            case 1:
                // テキスト問題(テキスト回答)
                $rules = $this->getTextTextQuestionRules();
                break;
            case 2:
                // テキスト問題(画像回答)
                $rules = $this->getTextImageQuestionRules();
                break;
            case 3:
                // 画像問題(テキスト回答)
                $rules = $this->getImageTextQuestionRules();
                break;
            case 4:
                $rules = $this->getImageImageQuestionRules();
                break;
        }

        $rules['is_answer'] = ['required'];
        $rules['explanation'] = ['required'];

        return $rules;
    }

    public function messages()
    {
        return [
            '*.required' => ':attributeを入力してください。',
        ];
    }

    public function attributes()
    {
        return [
            'title' => '問題内容',
            'text_choices_1' => '問題テキスト 選択肢A',
            'text_choices_2' => '問題テキスト 選択肢B',
            'text_choices_3' => '問題テキスト 選択肢C',
            'text_choices_4' => '問題テキスト 選択肢D',
            'photo_file' => '問題画像',
            'photo_file_1' => '問題画像 1',
            'photo_file_2' => '問題画像 2',
            'photo_file_3' => '問題画像 3',
            'photo_file_4' => '問題画像 4',
            'is_answer' => '解答結果',
            'explanation' => '解答解説'
        ];
    }

    private function getTextTextQuestionRules(): array
    {
        return [
            'title' => ['required'],
            'text_choices_1' => ['required'],
            'text_choices_2' => ['required'],
            'text_choices_3' => ['required'],
            'text_choices_4' => ['required']
        ];
    }
    private function getTextImageQuestionRules(): array
    {
        return [
            'title' => ['required'],
            'photo_file_1' => ['required'],
            'photo_file_2' => ['required'],
            'photo_file_3' => ['required'],
            'photo_file_4' => ['required']
        ];
    }
    private function getImageTextQuestionRules(): array
    {
        return [
            'photo_file' => ['required'],
            'title' => ['required'],
            'text_choices_1' => ['required'],
            'text_choices_2' => ['required'],
            'text_choices_3' => ['required'],
            'text_choices_4' => ['required']
        ];
    }

    private function getImageImageQuestionRules(): array
    {
        return [
            'photo_file' => ['required'],
            'title' => ['required'],
            'photo_file_1' => ['required'],
            'photo_file_2' => ['required'],
            'photo_file_3' => ['required'],
            'photo_file_4' => ['required']
        ];
    }
}
