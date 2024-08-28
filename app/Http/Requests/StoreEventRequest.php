<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    // public function rules(): array
    // {
    //     return [
    //         'event_name' => 'required|string|max:255',
    //         'event_date' => 'required|date',
    //         'event_time' => 'required|date_format:H:i',
    //         'organizer_id' => 'required|exists:organizers,id',
    //         'description' => 'nullable|string',
    //         'event_type_id' => 'required|exists:event_types,id',
    //     ];
    // }
}
