<x-front-layout>
  <!-- Hero -->
  <section class="container relative pb-[100px] pt-[30px]">
    <div class="flex flex-col items-center justify-center gap-[30px]">
      <!-- Preview Image -->
      <div class="relative">
        <div class="absolute z-0 hidden lg:block">
          <div class="font-extrabold text-[220px] text-darkGrey tracking-[-0.06em] leading-[101%]">
            <div data-aos="fade-right" data-aos-delay="300">
              NEW
            </div>
            <div data-aos="fade-left" data-aos-delay="600">
              ALPHARD
            </div>
          </div>
        </div>
        <img src="/images/alphard.png" class="w-full max-w-[963px] z-10 relative" alt="" data-aos="zoom-in"
             data-aos-delay="950" data-aos-duration="1500">
      </div>

      <div class="flex flex-col lg:flex-row items-center justify-around lg:gap-[60px] gap-7">
        <!-- Car Details -->
        <div class="flex items-center gap-y-12">
          <div class="flex flex-col items-center gap-[2px] px-3 md:px-10" data-aos="fade-left" data-aos-delay="1300">
            <h6 class="font-bold text-dark text-xl md:text-[26px] text-center">
              250
            </h6>
            <p class="text-sm font-normal text-center md:text-base text-secondary">
              Horse Power
            </p>
          </div>
          <span class="vr" data-aos="fade-left" data-aos-delay="1450"></span>
          <div class="flex flex-col items-center gap-[2px] px-3 md:px-10" data-aos="fade-left" data-aos-delay="1600">
            <h6 class="font-bold text-dark text-xl md:text-[26px] text-center">
              CVT
            </h6>
            <p class="text-sm font-normal text-center md:text-base text-secondary">
              Transmission
            </p>
          </div>
          <span class="vr" data-aos="fade-left" data-aos-delay="1750"></span>
          <div class="flex flex-col items-center gap-[2px] px-3 md:px-10" data-aos="fade-left" data-aos-delay="1900">
            <h6 class="font-bold text-dark text-xl md:text-[26px] text-center">
              TSS
            </h6>
            <p class="text-sm font-normal text-center md:text-base text-secondary">
              Safety
            </p>
          </div>
          <span class="vr" data-aos="fade-left" data-aos-delay="2050"></span>
          <div class="flex flex-col items-center gap-[2px] px-3 md:px-10" data-aos="fade-left" data-aos-delay="2200">
            <h6 class="font-bold text-dark text-xl md:text-[26px] text-center">
              A.I
            </h6>
            <p class="text-sm font-normal text-center md:text-base text-secondary">
              T-intouch
            </p>
          </div>
        </div>
        <!-- Button Primary -->
        <div class="p-1 rounded-full bg-primary group" data-aos="zoom-in" data-aos-delay="3000">
          <a href="#popularCars" class="btn-primary">
            <p class="transition-all duration-[320ms] translate-x-3 group-hover:-translate-x-1">
              Rent Now
            </p>
            <img src="/svgs/ic-arrow-right.svg"
                 class="opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-[320ms]"
                 alt="">
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Popular Cars -->
  <section class="bg-darkGrey" id="popularCars">
    <div class="container relative py-[100px]">
      <header class="mb-[30px]">
        <h2 class="font-bold text-dark text-[26px] mb-1">
          Popular Cars
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

  <!-- Extra Benefits -->
  <section class="container relative pt-[100px]">
    <div class="flex items-center flex-col md:flex-row flex-wrap justify-center gap-8 lg:gap-[120px]">
      <img src="/images/testimonial.png" class="w-full lg:max-w-[536px]" alt="" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
      <div class="max-w-[268px] w-full" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine" data-aos-duration="1550">
        <div class="flex flex-col gap-[30px]">
          <header>
            <h2 class="font-bold text-dark text-[26px] mb-1">
              Extra Benefits
            </h2>
            <p class="text-base text-secondary">You drive safety and famous</p>
          </header>
          <!-- Benefits Item -->
          <div class="flex items-center gap-4">
            <div class="bg-dark rounded-[26px] p-[19px]">
              <img src="/svgs/ic-car.svg" alt="">
            </div>
            <div>
              <h5 class="text-lg text-dark font-bold mb-[2px]">
                Delivery
              </h5>
              <p class="text-sm font-normal text-secondary">Gratis antar kerumah</p>
            </div>
          </div>
          <div class="flex items-center gap-4">
            <div class="bg-dark rounded-[26px] p-[19px]">
              <img src="/svgs/ic-card.svg" alt="">
            </div>
            <div>
              <h5 class="text-lg text-dark font-bold mb-[2px]">
                Transaction
              </h5>
              <p class="text-sm font-normal text-secondary">Pembayaran mudah</p>
            </div>
          </div>
          <div class="flex items-center gap-4">
            <div class="bg-dark rounded-[26px] p-[19px]">
              <img src="/svgs/ic-securityuser.svg" alt="">
            </div>
            <div>
              <h5 class="text-lg text-dark font-bold mb-[2px]">
                Secure
              </h5>
              <p class="text-sm font-normal text-secondary">Indentitas terjamin</p>
            </div>
          </div>
          <div class="flex items-center gap-4">
            <div class="bg-dark rounded-[26px] p-[19px]">
              <img src="/svgs/ic-convert3dcube.svg" alt="">
            </div>
            <div>
              <h5 class="text-lg text-dark font-bold mb-[2px]">
                Service
              </h5>
              <p class="text-sm font-normal text-secondary">Respon cepat</p>
            </div>
          </div>
        </div>
        <!-- CTA Button -->
        <div class="mt-[50px]">
          <!-- Button Primary -->
          <div class="p-1 rounded-full bg-primary group">
            <a href="#!" class="btn-primary">
              <p class="transition-all duration-[320ms] translate-x-3 group-hover:-translate-x-4 text-center">
                Explore Cars
              </p>
              <img src="/svgs/ic-arrow-right.svg"
                   class="transition-all duration-[320ms] opacity-0 group-hover:opacity-100 group-hover:translate-x-4"
                   alt="">
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="container relative py-[100px]">
    <header class="text-center mb-[50px]">
      <h2 class="font-bold text-dark text-[26px] mb-1">
        Frequently Asked Questions
      </h2>
      <p class="text-base text-secondary">Learn more about Koruma and get a success</p>
    </header>

    <!-- Questions -->
    <div class="grid md:grid-cols-2 gap-x-[50px] gap-y-6 max-w-[910px] w-full mx-auto">
      <a href="#!" class="px-6 py-4 border rounded-[24px] border-grey h-min accordion max-w-[430px]"
         id="faq1">
        <div class="flex items-center justify-between gap-1">
          <p class="text-base font-semibold text-dark">
            Identitas apa yang diperlukan?
          </p>
          <img src="/svgs/ic-chevron-down-rounded.svg" class="transition-all" alt="">
        </div>
        <div class="hidden pt-4 max-w-[335px]" id="faq1-content">
          <p class="text-base text-dark leading-[26px]">
            Sobat mobi hanya perlu identitas KTP atau Passport saja.
          </p>
        </div>
      </a>
      <a href="#!" class="px-6 py-4 border rounded-[24px] border-grey h-min accordion max-w-[430px]"
         id="faq2">
        <div class="flex items-center justify-between gap-1">
          <p class="text-base font-semibold text-dark">
            Apa bisa sewa beserta driver?
          </p>
          <img src="/svgs/ic-chevron-down-rounded.svg" class="transition-all" alt="">
        </div>
        <div class="hidden pt-4 max-w-[335px]" id="faq2-content">
          <p class="text-base text-dark leading-[26px]">
            Sobat mobi tenang kami melayani sewa kendaraan beserta driver yang ready 24 jam.
          </p>
        </div>
      </a>
      <a href="#!" class="px-6 py-4 border rounded-[24px] border-grey h-min accordion max-w-[430px]"
         id="faq3">
        <div class="flex items-center justify-between gap-1">
          <p class="text-base font-semibold text-dark">
            Apa bisa antar mobil sampai rumah?
          </p>
          <img src="/svgs/ic-chevron-down-rounded.svg" class="transition-all" alt="">
        </div>
        <div class="hidden pt-4 max-w-[335px]" id="faq3-content">
          <p class="text-base text-dark leading-[26px]">
            Sobat mobi tidak perlu ke kantor service utama kami mobil siap antar kerumah tanpa biaya tambahan.
          </p>
        </div>
      </a>
      <a href="#!" class="px-6 py-4 border rounded-[24px] border-grey h-min accordion max-w-[430px]"
         id="faq4">
        <div class="flex items-center justify-between gap-1">
          <p class="text-base font-semibold text-dark">
            Apakah ada paket wisata?
          </p>
          <img src="/svgs/ic-chevron-down-rounded.svg" class="transition-all" alt="">
        </div>
        <div class="hidden pt-4 max-w-[335px]" id="faq4-content">
          <p class="text-base text-dark leading-[26px]">
            Paket wisata pastinya ada untuk sobat mobi, bisa tanyakan ke admin.
          </p>
        </div>
      </a>
      <a href="#!" class="px-6 py-4 border rounded-[24px] border-grey h-min accordion max-w-[430px]"
         id="faq5">
        <div class="flex items-center justify-between gap-1">
          <p class="text-base font-semibold text-dark">
            Apa bisa antar jemput bandara?
          </p>
          <img src="/svgs/ic-chevron-down-rounded.svg" class="transition-all" alt="">
        </div>
        <div class="hidden pt-4 max-w-[335px]" id="faq5-content">
          <p class="text-base text-dark leading-[26px]">
            Sobat mobi tak perlu khawatir, kami siap melayani antar jemput bandara 24 jam.
          </p>
        </div>
      </a>
      <a href="#!" class="px-6 py-4 border rounded-[24px] border-grey h-min accordion max-w-[430px]"
         id="faq6">
        <div class="flex items-center justify-between gap-1">
          <p class="text-base font-semibold text-dark">
            Apa bisa sewa bus?
          </p>
          <img src="/svgs/ic-chevron-down-rounded.svg" class="transition-all" alt="">
        </div>
        <div class="hidden pt-4 max-w-[335px]" id="faq6-content">
          <p class="text-base text-dark leading-[26px]">
            Sobat mobi juga bisa menyewa bus kecil, bus medium, atau bus besar.
          </p>
        </div>
      </a>
    </div>
  </section>

  <!-- Instant Booking -->
  <section class="relative bg-[#060523]">
    <div class="container py-20">
      <div class="flex flex-col">
        <header class="mb-[50px] max-w-[360px] w-full">
          <h2 class="font-bold text-white text-[26px] mb-4">
            Perjalanan Lancar. <br>
            Perjalanan No Was-Was.
          </h2>
          <p class="text-base text-subtlePars">Segera lakukan pemesanan untuk mengejar apa pun 
            yang ingin Anda capai hari ini, ya.</p>
        </header>
        <!-- Button Primary -->
        <div class="p-1 rounded-full bg-primary group w-max">
          <a href="#popularCars" class="btn-primary">
            <p class="transition-all duration-[320ms] translate-x-3 group-hover:-translate-x-1">
              Book Now
            </p>
            <img src="/svgs/ic-arrow-right.svg"
                 class="opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-[320ms]"
                 alt="">
          </a>
        </div>
      </div>
      <div class="absolute bottom-[-5px] right-0 lg:w-[764px] max-h-[332px] hidden lg:block">
        <img src="/images/alphard.png" alt="">
      </div>
    </div>
  </section>


  <footer class="py-10 md:pt-[100px] md:pb-[70px] container">
    <p class="text-base text-center text-secondary">
      All Rights Reserved. Copyright Koruma Rent Car 2024.
    </p>
  </footer>
</x-front-layout>