<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StudioVideoRequest extends Request
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
    return [
      'name' => 'required|max:255',
      'price' => 'required|regex:/^\d*(\.\d{2})?$/',
      'video' => 'required|mimes:ogg,flv,mkv,mp4,avi,wmv,movie,mov,webm'
    ];
  }
}
