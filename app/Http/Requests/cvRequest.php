<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class cvRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'presentation' =>'required|min:5|max:2000',
            'domaine' => 'required|in:Informatique,Sience sentifique,Phyqique,Mathematique',
            'Photo' => 'image',
            'pays' => 'required|alpha|max:20',
            'ville' => 'required|alpha|max:20',
            'adresse' => 'required|max:150',
            'temps_jop'=>'required|in:Part time,Full time'
        ];
    }
}
