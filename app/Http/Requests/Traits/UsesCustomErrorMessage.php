<?php

namespace App\Http\Requests\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait UsesCustomErrorMessage
{
    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        $messagesV = $validator->getMessageBag()->getMessages();
        $messages = [];
        $index = 0;
        foreach ($messagesV as $item => $value){
            $messages[$index]['title'] = $value[0];
            $messages[$index]['source']['parameter'] = $item;
            $index++;
        }
        throw new HttpResponseException(response()->json(['errors' => $messages], 400));
    }
}
