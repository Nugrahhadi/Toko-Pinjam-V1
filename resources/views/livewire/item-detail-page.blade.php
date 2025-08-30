<div>
    @section('title', $item->name)

    <livewire:components.navbar />

    <div class="bg-gray-50 pt-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('all-items') }}" 
   class="inline-flex items-center  text-base text-medium text-[#433592] hover:underline mb-4">
    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" 
         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
    </svg>
    Barang
</a>

            <h1 class="text-3xl lg:text-4xl font-extrabold mb-2" style="color:#433592; font-family:'Google Sans','Product Sans',sans-serif;">{{ $item->name }}</h1>
            <div class="flex items-center gap-2 text-sm text-gray-600">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full bg-[#433592]/10 text-[#433592] font-semibold">{{ $item->category->name ?? 'Tanpa Kategori' }}</span>
                <span>•</span>
                <span>{{ $item->location->name ?? 'Lokasi tidak tersedia' }}</span>
            </div>
        </div>
    </div>

    <div class="bg-gray-50 py-10">
        <div class="max-w-7xl mb-10 mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- LEFT: Konten utama -->
                <div class="lg:col-span-8">
                    {{-- Gambar utama + thumbnail --}}
                    @php
                        $images = $item->images ?: [];
                        $normalized = collect($images)->map(function($path){
                            if (\Illuminate\Support\Str::startsWith($path, ['http://','https://','/'])) return $path;
                            return asset('storage/'.$path);
                        })->values()->all();
                        $mainImg = $normalized[0] ?? 'https://via.placeholder.com/1200x900?text=No+Image';
                    @endphp

                    <div x-data="{ current: '{{ $mainImg }}' }" class="bg-white rounded-2xl shadow overflow-hidden">
                        <div class="bg-white">
                            <img :src="current" alt="{{ $item->name }}" class="w-full h-[450px] object-contain" />
                        </div>
                        @if (count($normalized) > 1)
                            <div class="p-4 grid grid-cols-4 sm:grid-cols-6 gap-3 bg-white border-t">
                                @foreach ($normalized as $img)
                                    <button type="button" @click="current='{{ $img }}'" class="border rounded-lg overflow-hidden focus:outline-none focus:ring-2 focus:ring-[#433592]">
                                        <img src="{{ $img }}" alt="thumb" class="w-full h-20 object-cover" />
                                    </button>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    {{-- Tabs: Deskripsi / Kelengkapan / Cara Pakai --}}
                    <div x-data="{ tab: 'deskripsi' }" class="mt-6 mb-10 bg-white rounded-2xl shadow">
                        <div class="flex gap-2 p-2 border-b">
                            @php $tabBase = 'px-4 py-2 rounded-lg text-sm font-semibold'; @endphp
                            <button @click="tab='carapinjaman'"
                                :class="tab==='carapinjaman' ? 'bg-[#433592] text-white {{ $tabBase }}' : 'bg-gray-100 text-gray-700 hover:bg-gray-200 {{ $tabBase }}'">
                                Tata Cara Pinjam
                            </button>
                            <button @click="tab='deskripsi'"
                                :class="tab==='deskripsi' ? 'bg-[#433592] text-white {{ $tabBase }}' : 'bg-gray-100 text-gray-700 hover:bg-gray-200 {{ $tabBase }}'">
                                Deskripsi Barang
                            </button>
                            <button @click="tab='kelengkapan'"
                                :class="tab==='kelengkapan' ? 'bg-[#433592] text-white {{ $tabBase }}' : 'bg-gray-100 text-gray-700 hover:bg-gray-200 {{ $tabBase }}'">
                                Kelengkapan
                            </button>
                            <button @click="tab='carapakai'"
                                :class="tab==='carapakai' ? 'bg-[#433592] text-white {{ $tabBase }}' : 'bg-gray-100 text-gray-700 hover:bg-gray-200 {{ $tabBase }}'">
                                Cara Pakai
                            </button>
                        </div>
                        <div class="p-6 prose max-w-none">
                            <div x-show="tab==='carapinjaman'">
                                @php $howToBorrow = $item->how_to_borrow ?? null; @endphp
                                @if ($howToBorrow)
                                    {!! nl2br(e($howToBorrow)) !!}
                                @else
                                    <p class="text-gray-500">Belum ada panduan tata cara pinjam.</p>
                                @endif
                            </div>
                            <div x-show="tab==='deskripsi'">
                                {!! nl2br(e($item->description)) !!}
                            </div>
                            <div x-show="tab==='kelengkapan'">
                                @php $kel = $item->completeness ?? null; @endphp
                                @if ($kel)
                                    {!! nl2br(e($kel)) !!}
                                @else
                                    <p class="text-gray-500">Belum ada informasi kelengkapan.</p>
                                @endif
                            </div>
                            <div x-show="tab==='carapakai'">
                                @php $how = $item->how_to_use ?? null; @endphp
                                @if ($how)
                                    {!! nl2br(e($how)) !!}
                                @else
                                    <p class="text-gray-500">Belum ada panduan cara pakai.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT: Sticky sidebar -->
                <div class="lg:col-span-4 lg:sticky lg:top-6 h-fit">
                    <div
    x-data="itemBooking($el)"
    x-init="init()"
    data-booked='@json($bookedRanges)'
    data-name='@json($item->name)'
    data-price="{{ (float) $item->donation_price }}"
    class="bg-white rounded-2xl border border-gray-100 p-5"
>
    <h3 class="text-lg font-bold mb-3">Ketersediaan</h3>
    <p class="text-sm text-gray-600 mb-3">Pilih tanggal pinjam. Tanggal yang diarsir/tidak bisa diklik berarti sudah dibooking.</p>

    {{-- pakai sr-only (aksesibel) agar elemen tetap ada untuk Flatpickr --}}
    <div class="calendar-scope">
    <input type="text" x-ref="picker" class="sr-only" />
    </div>

    <div class="mt-4 p-3 bg-gray-50 rounded-lg text-sm">
        <div class="flex items-center justify-between">
            <span>Tanggal mulai</span>
            <span class="font-semibold" x-text="startDateText || '-' "></span>
        </div>
        <div class="flex items-center justify-between mt-1">
            <span>Tanggal selesai</span>
            <span class="font-semibold" x-text="endDateText || '-' "></span>
        </div>
    </div>

    <div class="mt-5 border-t pt-4">
        <div class="flex items-baseline justify-between">
            <div>
                <div class="text-sm text-gray-500">Harga</div>
                <div class="text-xl font-extrabold text-[#433592]">
                    Rp{{ number_format($item->donation_price) }} <span class="text-sm font-medium text-gray-500">/ hari</span>
                </div>
            </div>
            <div class="text-right">
                <div class="text-sm text-gray-500">Durasi</div>
                <div class="text-lg font-semibold" x-text="totalDays > 0 ? totalDays + ' hari' : '-' "></div>
            </div>
        </div>
        <div class="mt-3 flex items-center justify-between">
            <div class="text-sm text-gray-500">Total biaya pinjam</div>
            <div class="text-2xl font-bold" x-text="formatRupiah(totalCost)"></div>
        </div>
        <button
            :disabled="!canBook"
            :href="waHref"
            @click.prevent="if(canBook){window.open(waHref,'_blank')}"
            class="mt-4 w-full inline-flex items-center justify-center rounded-xl px-4 py-3 text-white font-semibold bg-[#433592] hover:bg-[#3A2B7A] disabled:opacity-50 disabled:cursor-not-allowed">
            Pinjam via WhatsApp
        </button>
        <p class="mt-2 text-xs text-gray-500">Pemesanan dilakukan via WhatsApp. Admin akan memproses booking di halaman admin.</p>
    </div>
</div>

            </div>
        </div>
    </div>

    <livewire:components.footer />
</div>

{{-- dependensi & helper khusus halaman ini, tanpa bergantung layout --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<style>
/* Flatpickr: no shadow + full width + grid rapi */
.calendar-scope .flatpickr-calendar{
  width:90% !important;
  max-width:none !important;
  box-shadow:none !important;
  border:1px solid #e5e7eb; /* gray-200 */
  border-radius:1rem;       /* rounded-2xl */
  box-sizing:border-box;
}
.calendar-scope .flatpickr-days,
.calendar-scope .dayContainer{ width:100% !important; max-width:none !important; }
.calendar-scope .dayContainer{
  display:grid !important;
  grid-template-columns:repeat(7,minmax(0,1fr));
  grid-auto-rows:2.5rem;
}
.calendar-scope .flatpickr-day{
  width:auto !important;
  height:2.5rem;
  line-height:2.5rem;
  margin:0;
  box-shadow:none !important;
}

.calendar-scope .flatpickr-day::after{
  --dot: 1.55rem;            /* <— ubah ukuran bulatan di sini */
  content:"";
  position:absolute;
  width:var(--dot);
  height:var(--dot);
  border-radius:9999px;
  top:50%; left:50%;
  transform:translate(-50%,-50%);  /* benar2 tengah kotak */
  background:transparent;
  pointer-events:none;
}
.calendar-scope .flatpickr-day.selected,
.calendar-scope .flatpickr-day.startRange,
.calendar-scope .flatpickr-day.endRange{
  background:#433592 !important; border-color:#433592 !important; color:#fff !important;
}
.calendar-scope .flatpickr-day.inRange{ background:#433592 !important; color:#fff !important;}
.calendar-scope .flatpickr-day.today{ border-color:#433592 !important; box-shadow:none !important; }
.calendar-scope .flatpickr-day.disabled,
.calendar-scope .flatpickr-day.flatpickr-disabled{
 color:#9ca3af !important; cursor:not-allowed;
}
</style>


<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>

<script>
function itemBooking(el) {
  return {
    // muat dari data-attributes
    itemName: JSON.parse(el.dataset.name || '""'),
    price: Number(el.dataset.price || 0),
    bookedRanges: JSON.parse(el.dataset.booked || '[]'),

    start: null,
    end: null,

    get startDateText(){ return this.start ? this.fmtLong(this.start) : null; },
    get endDateText(){ return this.end ? this.fmtLong(this.end) : null; },
    get totalDays(){
      if(!this.start) return 0;
      if(!this.end) return 1; // single day
      const ms = this.end.setHours(0,0,0,0) - this.start.setHours(0,0,0,0);
      const days = Math.floor(ms / (1000*60*60*24)) + 1; // inclusive
      return days > 0 ? days : 0;
    },
    get totalCost(){ return this.totalDays * Number(this.price || 0); },
    get canBook(){ return !!this.start; },
    get waHref(){
      const base = 'https://wa.me/6285128050500?text=';
      const msg = this.buildMessage();
      return base + encodeURIComponent(msg);
    },
    buildMessage(){
      if(!this.start) return `Halo, saya ingin menanyakan ketersediaan ${this.itemName}.`;
      if(!this.end){
        return `halo, saya ingin meminjam ${this.itemName} pada tanggal ${this.fmtLong(this.start)}`;
      }
      return `halo, saya ingin meminjam ${this.itemName} pada tanggal ${this.fmtLong(this.start)} hingga ${this.fmtLong(this.end)}`;
    },
    fmtLong(d){ return d.toLocaleDateString('id-ID', { weekday:'long', day:'2-digit', month:'long', year:'numeric' }); },
    formatRupiah(n){
      try { return new Intl.NumberFormat('id-ID', { style:'currency', currency:'IDR', maximumFractionDigits:0 }).format(n||0); }
      catch(e){ return 'Rp'+(n||0).toLocaleString('id-ID'); }
    },
    init(){
      console.log('itemBooking init', { bookedRanges: this.bookedRanges, itemName: this.itemName, price: this.price });
      const disabled = (this.bookedRanges||[]).map(r => ({ from: r.from, to: r.to }));
      flatpickr(this.$refs.picker, {
        mode: 'range',
        inline: true,
        minDate: 'today',
        dateFormat: 'Y-m-d',
        locale: flatpickr.l10ns.id,
        disable: disabled,
        onChange: (selectedDates) => {
          if(selectedDates.length === 0){ this.start = this.end = null; return; }
          if(selectedDates.length === 1){ this.start = selectedDates[0]; this.end = null; return; }
          this.start = selectedDates[0];
          this.end   = selectedDates[1];
        },
      });
    }
  }
}
</script>

