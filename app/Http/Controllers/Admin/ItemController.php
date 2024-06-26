<?php

namespace App\Http\Controllers\Admin;

use App\Models\Item;
use App\Models\Type;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\ItemRequest;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    if (request()->ajax()) {
      $query = Item::with(['type', 'brand']);

      return DataTables::of($query)
        ->editColumn('thumbnail', function ($item) {
          return '<img src="' . $item->thumbnail . '" alt="Thumbnail" class="w-20 mx-auto rounded-md">';
        })
        ->addColumn('action', function ($item) {
          return '
                        <a class="block w-full px-2 py-1 mb-1 text-xs text-center text-white transition duration-500 bg-gray-700 border border-gray-700 rounded-md select-none ease hover:bg-gray-800 focus:outline-none focus:shadow-outline" 
                            href="' . route('admin.item.edit', $item->id) . '">
                            Edit
                        </a>
                        <form class="block w-full" onsubmit="return confirm(\'Apakah anda yakin?\');" -block" action="' . route('admin.item.destroy', $item->id) . '" method="POST">
                        <button class="w-full px-2 py-1 text-xs text-white transition duration-500 bg-red-500 border border-red-500 rounded-md select-none ease hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                            Hapus
                        </button>
                            ' . method_field('delete') . csrf_field() . '
                        </form>';
        })
        ->rawColumns(['action', 'thumbnail'])
        ->make();
    }

    return view('admin.item.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $brands = Brand::all();
    $types = Type::all();

    return view('admin.item.create', [
      'brands' => $brands,
      'types' => $types
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ItemRequest $request)
  {
    $data = $request->all();

    $data['slug'] = Str::slug($data['name']) . '-' . Str::lower(Str::random(5));

    if ($request->hasFile('photos')) {
      $photos = [];

      foreach ($request->file('photos') as $photo) {
        $photoPath = $photo->store('assets/item', 'public');

        array_push($photos, $photoPath);
      }

      $data['photos'] = json_encode($photos);
    }

    Item::create($data);

    return redirect()->route('admin.item.index');
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
  public function edit(Item $item)
  {
    $item->load('type', 'brand');

    $brands = Brand::all();
    $types = Type::all();

    return view('admin.item.edit', [
      'item' => $item,
      'brands' => $brands,
      'types' => $types
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(ItemRequest $request, Item $item)
  {
    $data = $request->all();

    if ($request->hasFile('photos')) {
      $photos = [];

      foreach ($request->file('photos') as $photo) {
        $photoPath = $photo->store('assets/item', 'public');

        array_push($photos, $photoPath);
      }

      $data['photos'] = json_encode($photos);
    } else {
      $data['photos'] = $item->photos;
    }

    $item->update($data);

    return redirect()->route('admin.item.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Item $item)
  {
    $item->delete();

    return redirect()->route('admin.item.index');
  }
}
