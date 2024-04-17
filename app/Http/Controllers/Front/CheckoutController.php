<?php

namespace App\Http\Controllers\Front;

use Carbon\Carbon;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
  public function index($slug)
  {
    $item = Item::with(['type', 'brand'])->whereSlug($slug)->firstOrFail();

    return view('checkout', [
      'item' => $item,
    ]);
  }

  public function store(Request $request, $slug)
  {
    // return $request->all();

    $request->validate([
      'name' => 'required|string|max:255',
      'start_date' => 'required',
      'end_date' => 'required',
      'address' => 'required|string|max:255',
      'city' => 'required|string|max:255',
      'zip' => 'required|string|max:255',
    ]);

    $start_date = Carbon::createFromFormat('d m Y', $request->start_date);
    $end_date = Carbon::createFromFormat('d m Y', $request->end_date);

    $days = $start_date->diffInDays($end_date);

    $item = Item::whereSlug($slug)->firstOrFail();

    $total_price = ($days * $item->price) + (($days * $item->price) * 0.1);

    $booking = $item->bookings()->create([
      'name' => $request->name,
      'start_date' => $start_date,
      'end_date' => $end_date,
      'address' => $request->address,
      'city' => $request->city,
      'zip' => $request->zip,
      'user_id' => auth()->user()->id,
      'total_price' => $total_price,
    ]);

    return redirect()->route('front.payment', $booking->id);
  }
}
