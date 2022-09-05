<?php

namespace App\Http\Requests;
use App\http\Controlers\Controller;
use App\Models\Genre;
use Illuminate\Foundation\Http\FormRequest;

class GenreUpdateRequest extends FormRequest
{
    public function authorize()
{
    return true;
}

    public function rules()
    {
        $genre = $this->route('genre');
        return [
            'name' => 'required|string|min:2|max:75|Unique:genres,name,'.$genre->id
        ];
    }
}
