<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
    //     return [
    //         'event_name' => 'sometimes|required|string|max:255',
    //         'event_date' => 'sometimes|required|date',
    //         'event_time' => 'sometimes|required|date_format:H:i',
    //         'organizer_id' => 'sometimes|required|exists:organizers,id',
    //         'description' => 'nullable|string',
    //         'event_type_id' => 'sometimes|required|exists:event_types,id',
    //     ];
    // }
}
