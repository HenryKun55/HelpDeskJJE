<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KnowledgeBaseRequest extends FormRequest
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
    public function rules()
    {
      $rules = [
        'subject' => 'required',
        'related_product' => 'required',
        'description' => 'required'
      ];

      $photos = count([$this->input('photos')]);
      foreach(range(0, $photos) as $index) {
        $rules['photos.' . $index] = 'mimes:jpeg,bmp,png,pdf|max:2000';
      }

      return $rules;
    }
}
