<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeightLogRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'date' => 'required|date',
            'weight' => 'required|numeric|digits_between:1,4|regex:/^\d{1,3}(\.\d)?$/',
            'calories' => 'required|integer',
            'exercise_time' => 'required|date_format:H:i',
            'exercise_content' => 'nullable|string|max:120',
        ];
    }

    public function messages(): array
    {
        return [
            'date.required' => '日付を入力してください',
            'date.date' => '正しい日付形式で入力してください',
            'weight.required' => '体重を入力してください',
            'weight.numeric' => '数字で入力してください',
            'weight.digits_between' => '4桁までの数字で入力してください',
            'weight.regex' => '小数点は1桁で入力してください',
            'calories.required' => '摂取カロリーを入力してください',
            'calories.integer' => '数字で入力してください',
            'exercise_time.required' => '運動時間を入力してください',
            'exercise_time.date_format' => '時:分（例: 13:00）の形式で入力してください',
            'exercise_content.max' => '120文字以内で入力してください',
        ];
    }

}
