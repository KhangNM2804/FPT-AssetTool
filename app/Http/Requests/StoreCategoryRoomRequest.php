<?php

namespace App\Http\Requests;

use App\Models\CategoryRoom;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCategoryRoomRequest extends FormRequest
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
            'status' => ['required', Rule::in([CategoryRoom::STATUS_ACTIVE, CategoryRoom::STATUS_INACTIVE])]
        ];
    }
}
