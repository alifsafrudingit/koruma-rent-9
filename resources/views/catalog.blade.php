<x-front-layout>
  <section class="bg-darkGrey" id="popularCars">
    <div class="container relative py-[100px]">
      <header class="mb-[30px]">
        <h2 class="font-bold text-dark text-[26px] mb-1">
          All Cars
        </h2>
        <p class="text-base text-secondary">Start your big day</p>
      </header>

      <!-- Cars -->
      <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-[29px]">
        @foreach ($items as $item)
          <!-- Card -->
          <div class="card-popular">
            <div>
              <h5 class="text-lg text-dark font-bold mb-[2px]">
                {{ $item->name }}
              </h5>
              <p class="text-sm font-normal text-secondary">
                {{ $item->type ? $item->type->name : '-' }}
              </p>
              <a href="{{ route('front.detail', $item->slug) }}" class="absolute inset-0"></a>
            </div>
            <img src="{{ $item->thumbnail }}" class="rounded-[18px] min-w-[216px] w-full h-[150px]" alt="">
            <div class="flex items-center justify-between gap-1">
              <!-- Price -->
              <p class="text-sm font-normal text-secondary">
                <span class="text-base font-bold text-primary">Rp {{number_format($item->price, 0, '', '.')}}</span>/day
              </p>
              <!-- Rating -->
              <p class="text-dark text-xs font-semibold flex items-center gap-[2px]">
                ({{ $item->star }}/5)
                <img src="/svgs/ic-star.svg" alt="">
              </p>
            </div>
            <div>
              <p class="text-sm font-normal text-secondary text-right items-end">
                {{ $item->review }} reviews
              </p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

<script>
  window.addEventListener("load", function(event) {
  document.querySelector('[data-dropdown-toggle="dropdown"]').click();
});
</script>
</x-front-layout>