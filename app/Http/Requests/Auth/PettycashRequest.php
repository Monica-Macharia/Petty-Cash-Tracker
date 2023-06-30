<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PettycashRequest extends FormRequest
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
            
            'name'=> ['nullable', 'string'],
            'payment_details' => ['nullable', 'integer'],
            'service'=> ['nullable', 'string'],
            'cash_payable'=> ['nullable', 'integer'],
            'status'=> ['nullable', 'string'],
        ];
    }
}
