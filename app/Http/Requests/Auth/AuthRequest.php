<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AuthRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    // Condition validated
    public function rules()
    {
        return [
            'date' => [
                'required',
                function ($attributes, $value, $fail) {
                    $day = \DateTime::createFromFormat('d-m-Y', $value);
                    $condition = $day && $day->format('d-m-Y') === $value;

                    if (!$condition) {
                        $fail('Invalid value.');
                    }
                }
            ]
        ];
    }

    // Message trả về lỗi
    public function messages()
    {
        return [];
    }

    public function prepareForValidation()
    {
        // key:  day | month | year -> key moi: date -> day-month-year

        // // Merge = clone
        $params = $this->input();
        $this->merge([
            'date' => formatShortDateValidated(['day' => $params['day'] ?? '', 'month' => $params['month'] ?? '', 'year' => $params['year'] ?? ''], 'date'),
        ]);
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // Có thể call api để check điều kiện
            // Custom validated
            // $validator->error()->add('key', message);


            // Example: Ngày | tháng | năm -> select box -> key:  day | month | year
            // $attributes = $validator->getData();
            // dd($validator->getData());
        });
    }

    // protected function failedValidation(Validator $validator)
    // {
    //     throw new HttpResponseException(response()->json([
    //         'success' => false,
    //         'message' => 'Validation errors',
    //         'data'    => $validator->errors(),
    //     ]));
    // }
}
