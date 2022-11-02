<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
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
            "first"=> "required|min:3",
            "last"=> "required|min:3",
            "company"=> "nullable|min:3",
            "job"=> "nullable|min:3",
            "email"=> "required|min:3|email",
            "phone"=> "required|min:5",
//            "photo"=>"mimes:jpeg,png,jpg,gif,svg|max:2048",
        "photo"=>"nullable",
            "birthday"=> "nullable|date"
        ];
    }
}
