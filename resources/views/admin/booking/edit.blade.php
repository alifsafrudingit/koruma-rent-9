<x-app-layout>
  <x-slot name="title">Admin</x-slot>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <a href="#!" onclick="window.history.go(-1); return false;">
          Booking 
        </a>
          {!! __('&raquo; Edit &raquo; #') . $booking->id . ' &middot ' . $booking->name !!}
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
        <form class="w-full" action="{{ route('admin.booking.update', $booking->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')

          <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
            <div class="w-full">
              <label for="grid-last-name" class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                Nama
              </label>
              <input value="{{ old('name') ?? $booking->name }}" name="name"
              class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
              id="grid-last-name" type="text" placeholder="Nama" required>
              <div class="mt-2 text-sm text-gray-500">
                Nama booking. Contoh: Alif Safrudin.
              </div>
            </div>
          </div>

          <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
            <div class="w-full">
              <label for="grid-last-name" class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                Alamat
              </label>
              <input value="{{ old('address') ?? $booking->address }}" name="address"
              class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
              id="grid-last-name" type="text" placeholder="Nama" required>
              <div class="mt-2 text-sm text-gray-500">
                Alamat booking. Contoh: Jl. Munggur Gg Sri Kandi, Demangan, Yogyakarta.
              </div>
            </div>
          </div>

          <div class="grid grid-cols-2 gap-3 px-3 mt-4 mb-6 -mx-3">
            <div class="w-full">
              <label for="grid-last-name" class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                Kota
              </label>
              <input value="{{ old('city') ?? $booking->city }}" name="city"
              class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
              id="grid-last-name" type="text" placeholder="Nama" required>
              <div class="mt-2 text-sm text-gray-500">
                Kota booking. Contoh: Yogyakarta.
              </div>
            </div>
            <div class="w-full">
              <label for="grid-last-name" class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                Kode Pos
              </label>
              <input value="{{ old('zip') ?? $booking->zip }}" name="zip"
              class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
              id="grid-last-name" type="text" placeholder="Nama" required>
              <div class="mt-2 text-sm text-gray-500">
                Kode Pos booking. Contoh: 57486
              </div>
            </div>
          </div>

          <div class="grid grid-cols-2 gap-3 px-3 mt-4 mb-6 -mx-3">
            <div class="w-full">
              <label for="grid-last-name" class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                Status Booking
              </label>
              <select name="status" 
                      class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="done" {{ $booking->status == 'done' ? 'selected' : '' }}>Done</option>
              </select>
              <div class="mt-2 text-sm text-gray-500">
                Status booking. Contoh: Pending.
              </div>
            </div>
            <div class="w-full">
              <label for="grid-last-name" class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                Status Pembayaran
              </label>
              <select name="payment_status" 
                      class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                <option value="pending" {{ $booking->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="success" {{ $booking->payment_status == 'success' ? 'selected' : '' }}>Success</option>
                <option value="failed" {{ $booking->payment_status == 'failed' ? 'selected' : '' }}>Failed</option>
                <option value="expired" {{ $booking->payment_status == 'expired' ? 'selected' : '' }}>Expired</option>
              </select>
              <div class="mt-2 text-sm text-gray-500">
                Status pembayaran booking. Contoh: Pending.
              </div>
            </div>
          </div>

          {{-- <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
           
          </div>

          <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
            
          </div> --}}

          <div class="flex flex-wrap mb-6 -mx-3">
            <div class="w-full px-3 text-right">
              <button type="submit" class="px-4 py-2 font-bold text-white bg-green-500 rounded shadow-lg hover:bg-green-700">
                Update Booking
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>