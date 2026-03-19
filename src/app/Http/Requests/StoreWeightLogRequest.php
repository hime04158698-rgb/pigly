<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWeightLogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'date' => ['required', 'date'],
            'weight' => ['required', 'numeric'],
            'calories' => ['required', 'integer'],
            'exercise_time' => ['required'],
            'exercise_content' => ['nullable', 'max:120'],
        ];
    }

    public function messages(): array
    {
        return [
            'date.required' => '日付を入力してください',
            'date.date' => '正しい日付を入力してください',

            'weight.required' => '体重を入力してください',
            'weight.numeric' => '体重は数値で入力してください',

            'calories.required' => '摂取カロリーを入力してください',
            'calories.integer' => '摂取カロリーは整数で入力してください',

            'exercise_time.required' => '運動時間を入力してください',

            'exercise_content.max' => '運動内容は120文字以内で入力してください',
        ];
    }
}
