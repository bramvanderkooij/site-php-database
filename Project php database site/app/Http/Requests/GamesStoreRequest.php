<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GamesStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' =>   'required|string|unique:tags,name|min:1|max:75',
            '' =>   'required|string|unique:tags,name|min:1|max:75',
            'name' =>   'required|string|unique:tags,name|min:1|max:75',
            'name' =>   'required|string|unique:tags,name|min:1|max:75'
        ];
    }
}
