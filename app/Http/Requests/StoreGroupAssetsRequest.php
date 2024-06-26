<?php

namespace App\Http\Requests;

use App\Models\GroupAsset;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreGroupAssetsRequest extends FormRequest
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
            'status' => ['required', Rule::in([GroupAsset::STATUS_ACTIVE, GroupAsset::STATUS_INACTIVE])]
        ];
    }
}
