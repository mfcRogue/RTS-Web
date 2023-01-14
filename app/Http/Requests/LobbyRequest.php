<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LobbyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'LobbyName' => 'nullable|string|max:255',
            'HostName' => 'nullable|string',
            'Visibility' => 'nullable|in:public,private,locked,friends',
            'HostIP' => 'nullable',
            'CurrentPlayers' => 'nullable|integer',
            'MaxPlayers' => 'nullable|integer',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
