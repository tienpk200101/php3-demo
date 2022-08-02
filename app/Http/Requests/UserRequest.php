<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [];
        $currentAction = $this->route()->getActionMethod();
        // Để lây phương thức hiện tại
        switch ($this->method()) {
            case 'POST':
                switch($currentAction){
                    case 'add': 
                        $rules = [
                            'tensv' => 'required',
                            'khoa' => 'required',
                            'tuoi' => 'required'
                        ];
                    default:
                        break;
                }
                break;

            default:
                break;
        }
        return $rules;
    }

    public function messages(){
        return [
            'tensv.required' => ':attribute bắt buộc phải nhập',
            'khoa.required' => ':attribute bắt buộc phải nhập',
            'tuoi.required' => ':attribute bắt buộc phải nhập'
        ];
    }

    public function attributes(){
        return [
            'tensv' => 'Tên sinh viên',
            'khoa' => 'Khoa',
            'tuoi' => 'Tuổi'
        ];
    }
}
