<?php

namespace App\Http\Requests;

use App\Resume;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\ValidationRules\Rules\Authorized;

class   ApplicationStoreRequest extends FormRequest
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
            'company' => 'required|min:3',
            'resume_id' => ['required', 'integer', 'exists:resumes,id', new Authorized('access', Resume::class)],
            'communicationMethod' => 'required|integer|exists:communication_methods,id',
            'website' => 'required|url',
            'role' => 'required|string|min:2',
            'applicationUrl' => 'required|url',
            'submissionDate' => 'required|date',
            'motivation' => 'string',
            'street' => 'required|string',
            'street_number' => 'required|string',
            'zipcode' => 'required|string',
            'city' => 'required|string',
        ];
    }
}
