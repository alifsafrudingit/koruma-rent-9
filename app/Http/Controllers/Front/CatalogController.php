<?php

namespace App\Http\Controllers\Front;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatalogController extends Controller
{
  public function index()
  {
    $items = Item::with(['type', 'brand'])->orderBy('review', 'DESC')->latest()->get();

    return view('catalog', [
      'items' => $items
    ]);
  }
}
