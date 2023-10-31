<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class kadai05_1Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $requestPath = $this->path();    //變數的確任用而已
        if($requestPath == 'kadai05_1'){
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
            'image.*' => ['required','image']
            //'image.*'  => 'image',
        ];
    }

    public function messages(){
        return[
            'image.required' => 'file`s name is blank',
            'image.*.image' => 'plz choose file'
        ];

    }
}
