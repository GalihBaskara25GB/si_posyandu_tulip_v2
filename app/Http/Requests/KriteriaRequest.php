<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KriteriaRequest extends FormRequest
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
            'objek_kriteria_id' => 'required',
            'kader_id' => 'required',
            'nilai' => 'required',
        ];
    }
}
