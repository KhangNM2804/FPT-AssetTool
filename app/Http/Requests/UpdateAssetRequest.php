<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAssetRequest extends FormRequest
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
            'name' => 'required',
            'category_asset_id' => 'exists:category_assets,id',
            'group_assets_id' => 'exists:group_assets,id',
            'price' => 'required',
            'symbol' => 'required',
            'invoice_number' => 'required',
            'date_of_use' => 'date|required',
            'document_number' => 'required',
            'unit' => 'required',
            'image' => 'mimes:jpeg,png|max:2048',
        ];
    }
}
