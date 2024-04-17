<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BookingRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return Auth::check();
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, mixed>
   */
  public function rules()
  {
    return [
      'name' => 'required|string|max:255',
      'start_date' => 'required|date',
      'end_date' => 'required|date',
      'address' => 'required|string|max:255',
      'city' => 'required|string|max:50',
      'zip' => 'nullable|string|max:10',
      'status' => 'required|string',
      'payment_method' => 'required|string',
      'payment_status' => 'required|string',
      'payment_url' => 'nullable|string',
      'total_price' => 'required|number',
      'item_id' => 'required|integer',
      'user_id' => 'required|integer',
    ];
  }
}
