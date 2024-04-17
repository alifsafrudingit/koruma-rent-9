<?php

namespace App\Http\Controllers\Front;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingController extends Controller
{
  public function index()
  {
    $items = Item::with(['type', 'brand'])->orderBy('review', 'DESC')->latest()->take(4)->get();
    
    return view('landing', [
      'items' => $items
    ]);
    // return 'Halaman Landing Page';
  }
}
