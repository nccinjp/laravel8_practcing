<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Kadai04_1Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this -> path() == 'kadai04_1'){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'student_id' => 'required|integer',   //integer就只會出現正整數
            'email' => 'email',
            'course' => 'integer',
        ];
    }

    public function messages(){
        return[
            'name.required' => '名前が入力されていません',
            'student_id.required' => '学籍番号が入力されていません',
            'student_id.integer' => '7桁の数字',
            'email.email' => 'email が入力されてない',
            'course.integer' => '入力されていません'
        ];
    }
}
