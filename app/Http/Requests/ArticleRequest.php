<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => 'required|string|max:200',
            'content' => 'required|string',
            'categories' => 'required'
        ];
    }

}
