<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
        return [
            'designation' => 'required',
            'description' => 'required',
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,doc,docx,mp3,mp4,jpeg,png,jpg,gif,svg|max:2048',
            'type' => 'required',
            'tags'=>'required'
        ];
    }
}
