<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RelatedCategoriesRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            "related" => "array|max:255"
        ];

        foreach($this->request->get('related') as $key => $val )
        {
            $rules['related.'.$key] = 'max:50';
        }
        return $rules;
    }
}
