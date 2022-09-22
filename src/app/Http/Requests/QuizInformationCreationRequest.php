<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\NotDeleted;
use App\Traits\UploadImageTrait;
use Storage;

class QuizInformationCreationRequest extends FormRequest
{
    use UploadImageTrait;
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $data = $this->all();
        $rules = [
            'quiz_title' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'status' => ['required'],
            'quiz_setting' => ['required'],
            'photo_path' => ['required'],
            // 'photo_path' => ['required', 'mimes:jpg,jpeg,png'],
            'start_date' => ['required', 'date_format:Y-m-d'],
            'start_time' => ['required', 'date_format:H:i'],
            // 'end_date' => ['required', 'date_format:Y-m-d'],
            // 'end_time' => ['required', 'date_format:H:i'],
            'prefecture' => ['required_if:quiz_phall_flag,1'],
            'quiz_phall_flag' => ['required'],
        ];

        if (isset($data['quiz_setting']) && $data['quiz_setting'] == 1) {
            $rules['key_password'] = ['required', 'string', 'confirmed', 'min:6', 'regex:/^[a-zA-Z0-9]+$/'];
            $rules['key_password_confirmation'] = ['required_with:key_password'];
        }

        if(isset($data['photo_file']) && $data['photo_file'] == ''){
            $rules['photo_path'] = ['required'];
        }

        if(isset($data['old_photo_url']) && $data['old_photo_url'] != ''){
            unset($rules['photo_path']);
        }

        //Temp Store Image
        if(isset($data['photo_path'])){
            //Replace Old temp
            If(session()->exists('old_photo_path')){
                Storage::disk('s3')->delete(session()->get('old_photo_path'));
            }

            $photo_path = $this->storeImage($data['photo_path'], 'quiz/image/');
            session()->put('old_photo_path', $photo_path);

            //New Image Upload
            $rules['photo_path'] =  ['required', 'mimes:jpg,jpeg,png'];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            '*.required' => ':attributeを入力してください。',
            '*.regex' => ':attributeに正しい形式を入力してください。',
            '*.date_format' => ':attributeに正しい形式を入力してください。',
            '*.confirmed' => ':attribute（確認）と一致していません。',
            'required_with:key_password' => 'クイズキーパスワードと確認キーパスワードが一致していません。',
            '*.required_if'          => ':attributeを入力してください。',
            '*.max' => ':attributeは、:max文字以下で入力してください。',
            '*.min' => ':attributeは、:min文字以上で入力してください。',
            '*.string' => ':attributeは文字列を入力してください。',
            '*.mimes' => ':attributeには:valuesタイプのファイルを入力してください。',
            '*.date_format' => ':attributeは:format形式で入力してください。',
        ];
    }

    public function attributes()
    {
        return [
            'quiz_title' => 'クイズタイトル',
            'description' => 'クイズ説明',
            'photo_path' => 'サムネイル',
            'status' => 'ステータス',
            'quiz_setting' => 'クイズキー',
            'start_date' => 'クイズ開始日',
            'start_time' => 'クイズ開始時間',
            'end_date' => 'クイズ終了日',
            'end_time' => 'クイズ終了時間',
            'key_password' => 'クイズキーパスワード',
            'password_confirmation' => '確認キーパスワード',
            'prefecture' => '都道府県',
            'quiz_phall_flag' => 'クイズ種類',
        ];
    }
}
