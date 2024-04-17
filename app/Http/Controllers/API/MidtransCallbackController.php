<?php

namespace App\Http\Controllers\API;

use Midtrans\Config;
use App\Models\Booking;
use Midtrans\Notification;
use App\Http\Controllers\Controller;

class MidtransCallbackController extends Controller
{
  public function callback()
  {
    Config::$serverKey = config('services.midtrans.serverKey');
    Config::$isProduction = config('services.midtrans.isProduction');
    Config::$isSanitized = config('services.midtrans.isSanitized');
    Config::$is3ds = config('services.midtrans.is3ds');

    $notification = new Notification();

    $status = $notification->transaction_status;
    $type = $notification->payment_type;
    $fraud = $notification->fraud_status;
    $order_id = $notification->order_id;

    $booking = Booking::findOrFail($order_id);

    if ($status == 'capture') {
      if ($type == 'credit_card') {
        if ($fraud == 'challenge') {
          $booking->payment_status = 'pending';
        } else {
          $booking->payment_status = 'success';
        }
      }
    } else if ($status == 'settlement') {
      $booking->payment_status = 'success';
    } else if ($status == 'pending') {
      $booking->payment_status = 'pending';
    } else if ($status == 'deny') {
      $booking->payment_status = 'cancelled';
    } else if ($status == 'expire') {
      $booking->payment_status = 'cancelled';
    } else if ($status == 'cancel') {
      $booking->payment_status = 'cancelled';
    }

    $booking->save();

    // return response($notification);
    return response()->json([
      'meta' => [
        'code' => 200,
        'message' => 'Midtrans Notification Success'
      ]
    ]);
  }
}
