<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;

class BookingController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    if (request()->ajax()) {
      $query = Booking::with(['item.brand', 'user']);

      return DataTables::of($query)
        ->editColumn('start_date', function ($booking) {
          return date('d-m-Y h:m:s', strtotime($booking->start_date));
        })
        ->editColumn('end_date', function ($booking) {
          return date('d-m-Y h:m:s ', strtotime($booking->end_date));
        })
        ->editColumn('total_price', function ($booking) {
          return 'Rp ' . number_format($booking->total_price, 0, '', '.');
        })
        ->addColumn('action', function ($booking) {
          return '
                      <a class="block w-full px-2 py-1 mb-1 text-xs text-center text-white transition duration-500 bg-gray-700 border border-gray-700 rounded-md select-none ease hover:bg-gray-800 focus:outline-none focus:shadow-outline" 
                          href="' . route('admin.booking.edit', $booking->id) . '">
                          Sunting
                      </a>
                      <form class="block w-full" onsubmit="return confirm(\'Apakah anda yakin?\');" -block" action="' . route('admin.booking.destroy', $booking->id) . '" method="POST">
                      <button class="w-full px-2 py-1 text-xs text-white transition duration-500 bg-red-500 border border-red-500 rounded-md select-none ease hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                          Hapus
                      </button>
                          ' . method_field('delete') . csrf_field() . '
                      </form>';
        })
        ->rawColumns(['action', 'total_price'])
        ->make();
    }

    return view('admin.booking.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Booking $booking)
  {
    return view('admin.booking.edit', [
      'booking' => $booking,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(BookingRequest $request, Booking $booking)
  {
    $data = $request->all();

    $booking->update($data);

    return redirect()->route('admin.booking.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Booking $booking)
  {
    $booking->delete();

    return redirect()->route('admin.booking.index');
  }
}
