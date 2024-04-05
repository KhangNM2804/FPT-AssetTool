<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreInvoiceRequest extends FormRequest
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
            'denominator'=>'nullable',
            'symbol' => [
                'required',
                Rule::unique('invoices')->where(function ($query) {
                    return $query->where('denominator', $this->input('denominator'))
                                 ->where('invoice_number', $this->input('invoice_number'));
                }),
            ],
            'invoice_number' => [
                'required',
                Rule::unique('invoices')->where(function ($query) {
                    return $query->where('symbol', $this->input('symbol'))
                                 ->where('denominator', $this->input('denominator'));
                }),
            ],
            'file'=>'required|mimes:pdf|max:2048'
        ];
    }
}
