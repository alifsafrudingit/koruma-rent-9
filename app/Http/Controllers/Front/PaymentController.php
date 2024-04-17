<?php

namespace App\Http\Controllers\Front;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
  public function index($bookingId)
  {
    $booking = Booking::with(['item.brand', 'item.type'])->findOrFail($bookingId);

    return view('payment', [
      'booking' => $booking,
    ]);
  }

  public function update(Request $request, $bookingId)
  {
    $booking = Booking::findOrFail($bookingId);

    $booking->payment_method = $request->payment_method;

    if ($request->payment_method == 'midtrans') {
      // Set your Merchant Server Key
      \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
      // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
      \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
      // Set sanitization on (default)
      \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
      // Set 3DS transaction for credit card to true
      \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');


      // Get USD to IDR rate from https://www.exchangerate.com/ using Guzzle
      // $client = new \GuzzleHttp\Client();
      // $response = $client->request('GET', 'https://api.exchangerate-api.com/v4/latest/USD');
      // $body = $response->getBody();
      // $rate = json_decode($body)->rates->IDR;

      // Convert to IDR
      // $totalPrice = $booking->total_price * $rate;

      // Create Midtrans Params
      // Docs : https://api-docs.midtrans.com/#charge-a-creadit-card
      $midtransParams = [
        'transaction_details' => [
          'order_id' => 'KORUMA-' . $booking->id,
          'gross_amount' => $booking->total_price,
        ],
        'customer_details' => [
          'first_name' => $request->first_name,
          'email' => $request->email,
        ],
        'enabled_payments' => ['bank_transfer', 'gopay', 'indomaret'],
      ];

      // Get Snap Payment Page URL
      $paymentUrl = \Midtrans\Snap::createTransaction($midtransParams)->redirect_url;

      // Save payment url to booking
      $booking->payment_url = $paymentUrl;

      // SAve booking
      $booking->save();

      return redirect($paymentUrl);
    }

    return redirect()->route('front.index');
  }
  public function success(Request $request)
  {
    return view('success');
  }
}
