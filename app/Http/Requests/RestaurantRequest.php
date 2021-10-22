<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
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
        return [
            //
            "name" => "required",
            "shortName" => "required",
            "logo" => "required",
            "front_image" => "required",
            "phone" => "size:10",
            "address" => "string",
            "city" => "string",
            "state" => "string",
            "slogan" => "string",
            "description" => "string|max:190",
        ];
    }
}
