<x-app-layout>
  <x-slot name="title">Admin</x-slot>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <a href="#!" onclick="window.history.go(-1); return false;">
          Item 
        </a>
          {!! __('&raquo; Buat') !!}
      </h2>
  </x-slot> 

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div>
        @if ($errors->any())
          <div class="mb-5" role="alert">
            <div class="px-4 py-2 font-bold text-white bg-red-500 rounded-t">
              Ada kesalahan!
            </div>
            <div class="px-4 py-3 text-red-700 bg-red-100 border border-t-0 border-red-400 rounded-b">
              <p>
                <ul>
                  @foreach ($errors->all() as $error )
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </p>
            </div>
          </div>
        @endif
        <form class="w-full" action="{{ route('admin.item.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
            <div class="w-full">
              <label for="grid-last-name" class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                Nama*
              </label>
              <input value="{{ old('name') }}" name="name"
              class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
              id="grid-last-name" type="text" placeholder="Nama" required>
              <div class="mt-2 text-sm text-gray-500">
                Nama item. Contoh: Item 1, Item 2, Item 3, dsb. Wajib diisi. Maksimal 255 karakter.
              </div>
            </div>
          </div>

          <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
            <div class="w-full">
              <label for="grid-last-name" class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                Brand*
              </label>
              <select name="brand_id"
              class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
              required>
              <option disabled>-- Pilih Brand --</option>
              @foreach ($brands as $brand )
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
              @endforeach
              </select>
              <div class="mt-2 text-sm text-gray-500">
                Brand item. Contoh: Honda. Wajib diisi.
              </div>
            </div>
          </div>

          <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
            <div class="w-full">
              <label for="grid-last-name" class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                Type*
              </label>
              <select name="type_id"
              class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
              required>
              <option disabled>-- Pilih Type --</option>
              @foreach ($types as $type )
                <option value="{{ $type->id }}">{{ $type->name }}</option>
              @endforeach
              </select>
              <div class="mt-2 text-sm text-gray-500">
                Brand type. Contoh: MPV. Wajib diisi.
              </div>
            </div>
          </div>

          <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
            <div class="w-full">
              <label for="grid-last-name" class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                Stock
              </label>
              <input value="{{ old('stock') }}" name="stock"
              class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
              id="grid-last-name" type="number" placeholder="Stock" required>
              <div class="mt-2 text-sm text-gray-500">
                Stock item. Contoh: 5. Opsional.
              </div>
            </div>
          </div>

          <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
            <div class="w-full">
              <label for="grid-last-name" class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                Fitur
              </label>
              <input value="{{ old('features') }}" name="features"
              class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
              id="grid-last-name" type="text" placeholder="Fitur" required>
              <div class="mt-2 text-sm text-gray-500">
                Fitur item. Contoh: Fitur 1, Fitur 2, Fitur 3, dsb. Dipisahkan dengan koma (,). Opsional.
              </div>
            </div>
          </div>

          <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
            <div class="w-full">
              <label for="grid-last-name" class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                Foto
              </label>
              <input value="{{ old('photos') }}" name="photos[]"
              class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
              id="grid-last-name" type="file" placeholder="Foto" multiple accept="image/png, image/jpeg, image/webp">
              <div class="mt-2 text-sm text-gray-500">
                Foto item. Lebih dari satu dapat diupload. Opsional.
              </div>
            </div>
          </div>

          <div class="grid grid-cols-3 gap-3 px-3 mt-4 mb-6 -mx-3">
            <div class="w-full">
              <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-last-name" >
                Harga*
              </label>
              <input value="{{ old('price') }}" name="price"
              class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
              id="grid-last-name" type="number" placeholder="Harga" required>
              <div class="mt-2 text-sm text-gray-500">
                Harga item. Angka. Contoh: 1000000. Wajib diisi.
              </div>
            </div>
            <div class="w-full">
              <label for="grid-last-name" class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                Rating
              </label>
              <input value="{{ old('star') }}" name="star"
              class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
              id="grid-last-name" type="number" placeholder="Rating" min="1" max="5" step=".01">
              <div class="mt-2 text-sm text-gray-500">
                Rating item. Angka. Contoh: 5. Minimal 1, maksimal 5. Opsional.
              </div>
            </div>
            <div class="w-full">
              <label for="grid-last-name" class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                Total Review
              </label>
              <input value="{{ old('review') }}" name="review"
              class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
              id="grid-last-name" type="number" placeholder="Total Review">
              <div class="mt-2 text-sm text-gray-500">
                Total Review item. Angka. Opsional.
              </div>
            </div>
          </div>

          <div class="flex flex-wrap mb-6 -mx-3">
            <div class="w-full px-3 text-right">
              <button type="submit" class="px-4 py-2 font-bold text-white bg-green-500 rounded shadow-lg hover:bg-green-700">
                Simpan Item
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>