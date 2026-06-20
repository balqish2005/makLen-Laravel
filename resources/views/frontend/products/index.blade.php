@extends('frontend.layouts.app')

@section('content')

@php use Illuminate\Support\Str; @endphp

<!-- ==================== BANNER KATALOG ==================== -->
<section class="relative overflow-hidden border-b border-white/5">

    <div class="flex md:hidden relative h-[35vh] items-center justify-center">
        <img src="{{ asset('images/banner_about.png') }}" class="absolute inset-0 w-full h-full object-cover scale-105 animate-[pulse_8s_infinite_alternate] opacity-40">
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/85 to-black"></div>

        <div class="relative z-10 text-center px-6 max-w-sm">
            <span class="uppercase tracking-[4px] text-[#fbbf24] text-[9px] font-bold bg-[#fbbf24]/10 px-3 py-1 rounded-full inline-block mb-2.5">
                Katalog Lengkap
            </span>
            <h1 class="text-3xl font-serif font-extrabold tracking-wide mb-3">
                Menu <span class="text-[#fbbf24]">makLen</span>
            </h1>
            <div class="w-12 h-[2px] bg-[#fbbf24] mx-auto mb-3 rounded-full"></div>
            <p class="text-gray-400 text-xs leading-relaxed">
                Jelajahi varian cake, cookies, dan roti premium buatan kami yang dibuat fresh setiap hari.
            </p>
        </div>
    </div>


    <div class="hidden md:flex relative h-[45vh] items-center justify-center">
        <img src="{{ asset('images/banner_about.png') }}" class="absolute inset-0 w-full h-full object-cover scale-105 animate-[pulse_8s_infinite_alternate] opacity-40">
        <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/80 to-black"></div>

        <div class="relative z-10 text-center px-4 max-w-2xl">
            <span class="uppercase tracking-[6px] text-[#fbbf24] text-xs font-bold bg-[#fbbf24]/10 px-4 py-1.5 rounded-full inline-block mb-3">
                Katalog Lengkap
            </span>
            <h1 class="text-4xl md:text-6xl font-serif font-extrabold tracking-wide mb-4">
                Menu <span class="text-[#fbbf24]">makLen</span>
            </h1>
            <div class="w-16 h-[2px] bg-[#fbbf24] mx-auto mb-4 rounded-full"></div>
            <p class="text-gray-400 text-sm md:text-base leading-relaxed">
                Jelajahi berbagai varian cake, cookies, roti, dan snack premium buatan kami yang dibuat fresh setiap hari.
            </p>
        </div>
    </div>

</section>

<section class="bg-black">
    <div class="max-w-7xl mx-auto border-b border-white/5">

        <div class="block md:hidden px-4 pt-6 pb-6 space-y-5">
            
            <div class="w-full relative group z-40">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-gray-500 group-focus-within:text-[#fbbf24] transition duration-200">
                    <i data-lucide="search" class="w-3.5 h-3.5"></i>
                </span>

                <input type="text"
                    id="search-input-mobile"
                    placeholder="Cari menu..."
                    autocomplete="off"
                    value="{{ request('search') }}"
                    class="w-full bg-[#111111] border border-white/5 text-white pl-10 pr-4 py-2.5 rounded-xl focus:outline-none focus:border-[#fbbf24] focus:ring-1 focus:ring-[#fbbf24] transition duration-200 text-xs placeholder-gray-600">

                <div id="search-suggestions-mobile"
                    class="hidden absolute top-full left-0 w-full mt-2 bg-[#111111] border border-white/10 rounded-xl overflow-hidden shadow-xl z-50">
                    <div id="recent-search-mobile" class="px-3 py-2 border-b border-white/10 hidden">
                        <div class="text-[10px] text-gray-500 mb-1.5">Pencarian Terakhir</div>
                        <div id="recent-list-mobile" class="flex flex-wrap gap-1.5"></div>
                    </div>
                </div>
            </div>

            <div class="w-full overflow-x-auto scrollbar-none -mx-4 px-4 flex items-center gap-2 flex-nowrap pb-1">
                <button data-category="all" class="filter-btn shrink-0 {{ !request('category') || request('category') == 'all' ? 'bg-[#fbbf24] text-black font-bold shadow-lg shadow-[#fbbf24]/10' : 'bg-[#111111] border border-white/5 text-gray-400 font-semibold' }} px-4 py-2 rounded-xl text-xs tracking-wide transition duration-200">
                    Semua
                </button>
                <button data-category="cake" class="filter-btn shrink-0 {{ request('category') == 'cake' ? 'bg-[#fbbf24] text-black font-bold shadow-lg shadow-[#fbbf24]/10' : 'bg-[#111111] border border-white/5 text-gray-400 font-semibold' }} px-4 py-2 rounded-xl text-xs tracking-wide transition duration-200">
                    Cake
                </button>
                <button data-category="cookies" class="filter-btn shrink-0 {{ request('category') == 'cookies' ? 'bg-[#fbbf24] text-black font-bold shadow-lg shadow-[#fbbf24]/10' : 'bg-[#111111] border border-white/5 text-gray-400 font-semibold' }} px-4 py-2 rounded-xl text-xs tracking-wide transition duration-200">
                    Cookies
                </button>
                <button data-category="roti" class="filter-btn shrink-0 {{ request('category') == 'roti' ? 'bg-[#fbbf24] text-black font-bold shadow-lg shadow-[#fbbf24]/10' : 'bg-[#111111] border border-white/5 text-gray-400 font-semibold' }} px-4 py-2 rounded-xl text-xs tracking-wide transition duration-200">
                    Roti
                </button>
                <button data-category="snack-box" class="filter-btn shrink-0 {{ request('category') == 'snack-box' ? 'bg-[#fbbf24] text-black font-bold shadow-lg shadow-[#fbbf24]/10' : 'bg-[#111111] border border-white/5 text-gray-400 font-semibold' }} px-4 py-2 rounded-xl text-xs tracking-wide transition duration-200">
                    Snack Box
                </button>
                <button data-category="hantaran" class="filter-btn shrink-0 {{ request('category') == 'hantaran' ? 'bg-[#fbbf24] text-black font-bold shadow-lg shadow-[#fbbf24]/10' : 'bg-[#111111] border border-white/5 text-gray-400 font-semibold' }} px-4 py-2 rounded-xl text-xs tracking-wide transition duration-200">
                    Hantaran
                </button>
            </div>

        </div>


        <div class="hidden md:flex px-6 md:px-16 pt-12 pb-8 flex-col lg:flex-row justify-between items-center gap-6 pb-8">
            
            <div class="w-full lg:w-96 relative group z-50">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-gray-500 group-focus-within:text-[#fbbf24] transition duration-200">
                    <i data-lucide="search" class="w-4 h-4"></i>
                </span>

                <input type="text"
                    id="search-input"
                    placeholder="Cari menu..."
                    autocomplete="off"
                    value="{{ request('search') }}"
                    class="w-full bg-[#111111] border border-white/5 text-white pl-11 pr-4 py-3 rounded-xl focus:outline-none focus:border-[#fbbf24] focus:ring-1 focus:ring-[#fbbf24] transition duration-200 text-sm placeholder-gray-600">

                <div id="search-suggestions"
                    class="hidden absolute top-full left-0 w-full mt-2 bg-[#111111] border border-white/10 rounded-xl overflow-hidden shadow-xl z-50">
                    <div id="recent-search" class="px-4 py-2 border-b border-white/10 hidden">
                        <div class="text-xs text-gray-500 mb-2">Pencarian Terakhir</div>
                        <div id="recent-list" class="flex flex-wrap gap-2"></div>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap gap-2 justify-center w-full lg:w-auto">
                <button data-category="all" class="filter-btn {{ !request('category') || request('category') == 'all' ? 'bg-[#fbbf24] text-black font-bold shadow-lg shadow-[#fbbf24]/10' : 'bg-[#111111] border border-white/5 text-gray-400 font-semibold' }} px-5 py-2.5 rounded-xl text-xs md:text-sm tracking-wide transition duration-200">
                    Semua Menu
                </button>
                <button data-category="cake" class="filter-btn {{ request('category') == 'cake' ? 'bg-[#fbbf24] text-black font-bold shadow-lg shadow-[#fbbf24]/10' : 'bg-[#111111] border border-white/5 text-gray-400 font-semibold' }} px-5 py-2.5 rounded-xl text-xs md:text-sm tracking-wide transition duration-200">
                    Cake
                </button>
                <button data-category="cookies" class="filter-btn {{ request('category') == 'cookies' ? 'bg-[#fbbf24] text-black font-bold shadow-lg shadow-[#fbbf24]/10' : 'bg-[#111111] border border-white/5 text-gray-400 font-semibold' }} px-5 py-2.5 rounded-xl text-xs md:text-sm tracking-wide transition duration-200">
                    Cookies
                </button>
                <button data-category="roti" class="filter-btn {{ request('category') == 'roti' ? 'bg-[#fbbf24] text-black font-bold shadow-lg shadow-[#fbbf24]/10' : 'bg-[#111111] border border-white/5 text-gray-400 font-semibold' }} px-5 py-2.5 rounded-xl text-xs md:text-sm tracking-wide transition duration-200">
                    Roti
                </button>
                <button data-category="snack-box" class="filter-btn {{ request('category') == 'snack-box' ? 'bg-[#fbbf24] text-black font-bold shadow-lg shadow-[#fbbf24]/10' : 'bg-[#111111] border border-white/5 text-gray-400 font-semibold' }} px-5 py-2.5 rounded-xl text-xs md:text-sm tracking-wide transition duration-200">
                    Snack Box
                </button>
                <button data-category="hantaran" class="filter-btn {{ request('category') == 'hantaran' ? 'bg-[#fbbf24] text-black font-bold shadow-lg shadow-[#fbbf24]/10' : 'bg-[#111111] border border-white/5 text-gray-400 font-semibold' }} px-5 py-2.5 rounded-xl text-xs md:text-sm tracking-wide transition duration-200">
                    Hantaran
                </button>
            </div>

        </div>

    </div>
</section>


<!-- ==================== SECTION KATALOG 2 (PRODUCT LIST) ==================== -->
<section class="pb-24 bg-black">
    <div class="max-w-7xl mx-auto">

        <!-- 📱 TAMPILAN KHUSUS MOBILE (Disesuaikan untuk Layar HP) -->
        <div class="block md:hidden px-4">
            
            <!-- Loading Indicator Mobile -->
            <div id="loading-indicator-mobile" class="hidden text-center py-6">
                <div class="inline-block w-8 h-8 border-4 border-[#fbbf24]/20 border-t-[#fbbf24] rounded-full animate-spin"></div>
                <p class="text-gray-400 text-xs mt-3 tracking-wide">Mencari menu...</p>
            </div>

            <!-- Product Grid Mobile (Dibuat 2 Kolom Sejajar agar Hemat Ruang) -->
            <div id="product-wrapper-mobile">
                <div id="product-grid-mobile" class="grid grid-cols-2 gap-3">
                    @forelse($products as $p)
                        @php
                            $categorySlug = isset($p->category) ? Str::slug($p->category->name) : 'bakery';
                        @endphp

                        <div data-category="{{ $categorySlug }}" class="product-card group bg-[#0d0d0d] border border-white/5 rounded-xl overflow-hidden hover:border-[#fbbf24]/40 transition duration-300 flex flex-col justify-between">
                            
                            <div>
                                <!-- Image Section Mobile -->
                                <div class="relative aspect-square w-full overflow-hidden bg-[#161616]">
                                    @if($p->image)
                                        <img src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex flex-col items-center justify-center text-gray-600 gap-1 scale-90">
                                            <i data-lucide="image-off" class="w-6 h-6 opacity-40"></i>
                                            <span class="text-[10px]">No Image</span>
                                        </div>
                                    @endif

                                    <span class="absolute top-2 left-2 bg-black/70 backdrop-blur-sm text-gray-300 text-[8px] uppercase tracking-wider font-bold px-1.5 py-0.5 rounded border border-white/10">
                                        {{ $p->category->name ?? 'Bakery' }}
                                    </span>
                                </div>

                                <!-- Text Section Mobile -->
                                <div class="p-3 space-y-1">
                                    <h3 class="product-name font-bold text-sm text-white group-hover:text-[#fbbf24] transition duration-200 line-clamp-1">
                                        {{ $p->name }}
                                    </h3>
                                    <p class="text-gray-400 text-[10px] leading-relaxed line-clamp-2">
                                        {{ $p->description ?? 'Pilihan menu terbaik dari Mak Len Bakery yang diproses higienis dan berkualitas.' }}
                                    </p>
                                </div>
                            </div>

                            <!-- Price & Action Section Mobile -->
                            <div class="p-3 pt-0">
                                <div class="flex flex-col gap-2 border-t border-white/5 pt-2.5">
                                    <div class="flex flex-col">
                                        <span class="text-[8px] uppercase text-gray-500 tracking-wider font-semibold">Harga</span>
                                        <span class="text-[#fbbf24] font-extrabold text-sm">
                                            Rp {{ number_format($p->price, 0, ',', '.') }}
                                        </span>
                                    </div>
                                    
                                    <a href="https://wa.me/6282232321112?text=Halo%20MakLen,%20saya%20ingin%20pesan%20menu%20*{{ urlencode($p->name) }}*%20ini."
                                       target="_blank"
                                       class="w-full justify-center bg-[#fbbf24] text-black border border-[#fbbf24] py-1.5 rounded-lg text-[10px] font-bold transition duration-300 flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                                        Pesan
                                    </a>
                                </div>
                            </div>

                        </div>
                    @empty
                        <div class="col-span-full text-center py-16 bg-[#0d0d0d] border border-dashed border-white/10 rounded-2xl p-6 space-y-2">
                            <div class="w-10 h-10 bg-[#fbbf24]/5 rounded-full flex items-center justify-center mx-auto border border-[#fbbf24]/10">
                                <i data-lucide="cookie" class="w-5 h-5 text-[#fbbf24] opacity-60"></i>
                            </div>
                            <h3 class="text-sm font-bold text-white">Menu Tidak Ditemukan</h3>
                            <p class="text-gray-400 text-[10px] leading-relaxed">
                                Coba cari varian menu Mak Len yang lain!
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Pagination Mobile -->
            @if($products->hasPages())
                <div id="pagination-container-mobile" class="mt-10 border-t border-white/5 pt-6 flex flex-col items-center gap-3">
                    <p class="text-[10px] text-gray-500 uppercase tracking-wider text-center">
                        Total: <span class="text-[#fbbf24] font-bold">{{ $products->total() }}</span> Menu
                    </p>
                    <div class="flex items-center gap-1 bg-[#0d0d0d] border border-white/5 p-1 rounded-xl scale-90">
                        @if($products->onFirstPage())
                            <span class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-700 cursor-not-allowed"><i data-lucide="chevron-left" class="w-3.5 h-3.5"></i></span>
                        @else
                            <a href="{{ $products->appends(request()->query())->previousPageUrl() }}" class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-400"><i data-lucide="chevron-left" class="w-3.5 h-3.5"></i></a>
                        @endif

                        @foreach ($products->links()->elements[0] as $page => $url)
                            @if ($page == $products->currentPage())
                                <span class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#fbbf24] text-black font-bold text-xs">{{ $page }}</span>
                            @else
                                <a href="{{ $products->appends(request()->query())->url($page) }}" class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-400 text-xs">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if($products->hasMorePages())
                            <a href="{{ $products->appends(request()->query())->nextPageUrl() }}" class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-400"><i data-lucide="chevron-right" class="w-3.5 h-3.5"></i></a>
                        @else
                            <span class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-700 cursor-not-allowed"><i data-lucide="chevron-right" class="w-3.5 h-3.5"></i></span>
                        @endif
                    </div>
                </div>
            @endif

        </div>


        <!-- 💻 TAMPILAN KHUSUS DESKTOP (KODE ASLI - SAMA SEKALI TIDAK DIGANGGU GUGAT) -->
        <div class="hidden md:block px-6 md:px-16">
            
            <div id="loading-indicator" class="hidden text-center py-10">
                <div class="inline-block w-10 h-10 border-4 border-[#fbbf24]/20 border-t-[#fbbf24] rounded-full animate-spin"></div>
                <p class="text-gray-400 text-sm mt-4 tracking-wide">Mencari menu...</p>
            </div>

            <div id="product-wrapper">
                <div id="product-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @forelse($products as $p)
                    @php
                        $categorySlug = isset($p->category) ? Str::slug($p->category->name) : 'bakery';
                    @endphp

                    <div data-category="{{ $categorySlug }}" class="product-card group bg-[#0d0d0d] border border-white/5 rounded-2xl overflow-hidden hover:border-[#fbbf24]/40 hover:shadow-2xl hover:shadow-[#fbbf24]/5 hover:-translate-y-1 transition duration-300 flex flex-col justify-between">
                        <div>
                            <div class="relative aspect-square w-full overflow-hidden bg-[#161616]">
                                @if($p->image)
                                    <img src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->name }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500 ease-in-out">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center text-gray-600 gap-2">
                                        <i data-lucide="image-off" class="w-8 h-8 opacity-40"></i>
                                        <span class="text-xs">No Image Available</span>
                                    </div>
                                @endif

                                <span class="absolute top-4 left-4 bg-black/70 backdrop-blur-md text-gray-300 text-[10px] uppercase tracking-wider font-bold px-3 py-1 rounded-md border border-white/10">
                                    {{ $p->category->name ?? 'Bakery' }}
                                </span>
                            </div>

                            <div class="p-5 space-y-2">
                                <h3 class="product-name font-bold text-lg text-white group-hover:text-[#fbbf24] transition duration-200 line-clamp-1">
                                    {{ $p->name }}
                                </h3>
                                <p class="text-gray-400 text-xs leading-relaxed line-clamp-2">
                                    {{ $p->description ?? 'Pilihan menu terbaik dari Mak Len Bakery yang diproses higienis, berkualitas, dan bercita rasa tinggi.' }}
                                </p>
                            </div>
                        </div>

                        <div class="p-5 pt-0">
                            <div class="flex justify-between items-center border-t border-white/5 pt-4">
                                <div class="flex flex-col">
                                    <span class="text-[9px] uppercase text-gray-500 tracking-wider font-semibold">Harga</span>
                                    <span class="text-[#fbbf24] font-extrabold text-base md:text-lg">
                                        Rp {{ number_format($p->price, 0, ',', '.') }}
                                    </span>
                                </div>
                                
                                <a href="https://wa.me/6282232321112?text=Halo%20MakLen,%20saya%20ingin%20pesan%20menu%20*{{ urlencode($p->name) }}*%20ini."
                                   target="_blank"
                                   class="bg-transparent hover:bg-[#fbbf24] text-[#fbbf24] hover:text-black border border-[#fbbf24] px-4 py-2 rounded-xl text-xs font-bold transition duration-300 flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                                    Pesan
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-24 bg-[#0d0d0d] border border-dashed border-white/10 rounded-3xl p-8 max-w-md mx-auto space-y-3">
                        <div class="w-12 h-12 bg-[#fbbf24]/5 rounded-full flex items-center justify-center mx-auto border border-[#fbbf24]/10">
                            <i data-lucide="cookie" class="w-6 h-6 text-[#fbbf24] opacity-60"></i>
                        </div>
                        <h3 class="text-lg font-bold text-white">Menu Tidak Ditemukan</h3>
                        <p class="text-gray-400 text-xs max-w-xs mx-auto leading-relaxed">
                            Kue dengan kata kunci tersebut tidak ditemukan di database kami. Coba cari varian menu Mak Len yang lain!
                        </p>
                    </div>
                @endforelse
                </div>
            </div>

            <!-- Pagination Desktop -->
            @if($products->hasPages())
                <div id="pagination-container" class="mt-16 border-t border-white/5 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <p class="text-xs text-gray-500 uppercase tracking-wider">
                        Menampilkan <span class="text-gray-300 font-semibold">{{ $products->firstItem() }}</span> - <span class="text-gray-300 font-semibold">{{ $products->lastItem() }}</span> dari <span class="text-[#fbbf24] font-bold">{{ $products->total() }}</span> Menu
                    </p>
                    <div class="flex items-center gap-1 bg-[#0d0d0d] border border-white/5 p-1 rounded-xl">
                        @if($products->onFirstPage())
                            <span class="w-9 h-9 flex items-center justify-center rounded-lg text-gray-700 cursor-not-allowed"><i data-lucide="chevron-left" class="w-4 h-4"></i></span>
                        @else
                            <a href="{{ $products->appends(request()->query())->previousPageUrl() }}" class="w-9 h-9 flex items-center justify-center rounded-lg text-gray-400 hover:bg-[#fbbf24] hover:text-black transition duration-200"><i data-lucide="chevron-left" class="w-4 h-4"></i></a>
                        @endif

                        @foreach ($products->links()->elements[0] as $page => $url)
                            @if ($page == $products->currentPage())
                                <span class="w-9 h-9 flex items-center justify-center rounded-lg bg-[#fbbf24] text-black font-bold text-xs md:text-sm">{{ $page }}</span>
                            @else
                                <a href="{{ $products->appends(request()->query())->url($page) }}" class="w-9 h-9 flex items-center justify-center rounded-lg text-gray-400 hover:bg-white/5 hover:text-white text-xs md:text-sm transition duration-200">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if($products->hasMorePages())
                            <a href="{{ $products->appends(request()->query())->nextPageUrl() }}" class="w-9 h-9 flex items-center justify-center rounded-lg text-gray-400 hover:bg-[#fbbf24] hover:text-black transition duration-200"><i data-lucide="chevron-right" class="w-4 h-4"></i></a>
                        @else
                            <span class="w-9 h-9 flex items-center justify-center rounded-lg text-gray-700 cursor-not-allowed"><i data-lucide="chevron-right" class="w-4 h-4"></i></span>
                        @endif
                    </div>
                </div>
            @endif

        </div>

    </div>
</section>

<footer class="border-t border-white/10 bg-[#0a0a0a] pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-6 md:px-16">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
            
            <div class="flex flex-col items-center text-center md:items-start md:text-left justify-between">
                <div>
                    <div class="flex flex-col items-center md:flex-row md:items-center gap-4 mb-4">
                        <div class="w-14 h-14 rounded-full bg-[#161616] border border-[#fbbf24]/30 flex items-center justify-center p-1 overflow-hidden shrink-0 shadow-[0_4px_15px_rgba(251,191,36,0.1)]">
                            <img src="{{ asset('images/logo-maklen.png') }}" alt="Logo Mak Len" class="w-full h-full object-cover rounded-full">
                        </div>
                        
                        <div class="flex flex-col items-center md:items-start">
                            <h2 style="font-family: 'Yellowtail', cursive;" class="text-4xl text-[#fbbf24] leading-none">makLen</h2>
                            <h3 style="font-family: 'Montserrat', sans-serif;" class="uppercase tracking-[0.2em] text-[10px] font-bold text-[#fbbf24] mt-1">cake & cookies</h3>
                        </div>
                    </div>
                    
                    <p class="text-gray-400 text-sm leading-relaxed mb-6 max-w-sm md:max-w-none">
                        Menghadirkan kelezatan premium di setiap gigitan. Dibuat dengan bahan pilihan dan cinta untuk momen spesial Anda.
                    </p>
                </div>

                <div class="flex gap-3 mt-2">
                    <a href="https://www.instagram.com/thomaajeng/" target="_blank" class="w-9 h-9 rounded-full bg-[#141414] border border-gray-800 flex items-center justify-center text-gray-400 hover:border-[#fbbf24]/40 hover:bg-[#fbbf24] hover:text-black transition duration-300">
                        <i class="fa-brands fa-instagram text-sm"></i>
                    </a>
                    <a href="https://wa.me/6282232321112?text=Halo%20MakLen,%20saya%20ingin%20pesan%20cake" target="_blank" class="w-9 h-9 rounded-full bg-[#141414] border border-gray-800 flex items-center justify-center text-gray-400 hover:border-[#fbbf24]/40 hover:bg-[#fbbf24] hover:text-black transition duration-300">
                        <i class="fa-brands fa-whatsapp text-sm"></i>
                    </a>
                </div>
            </div>

            <div class="col-span-1 md:col-span-2 grid grid-cols-2 gap-8 md:gap-12">
                
                <div class="md:pl-12">
                    <h4 class="text-white font-semibold mb-6 uppercase tracking-widest text-xs border-b border-white/5 pb-2 w-max pr-6">Navigasi</h4>
                    <ul class="space-y-3.5 text-sm text-gray-300">
                        <li>
                            <a href="{{ url('/') }}" class="hover:text-[#fbbf24] transition duration-200 flex items-center gap-2.5 group">
                                <i data-lucide="home" class="w-4 h-4 text-[#fbbf24] group-hover:text-gray-500 transition-all duration-200 transform group-hover:translate-x-1 flex-shrink-0"></i>
                                <span>Beranda</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/#about') }}" class="hover:text-[#fbbf24] transition duration-200 flex items-center gap-2.5 group">
                                <i data-lucide="info" class="w-4 h-4 text-[#fbbf24] group-hover:text-gray-500 transition-all duration-200 transform group-hover:translate-x-1 flex-shrink-0"></i>
                                <span>Tentang Kami</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/katalog') }}" class="hover:text-[#fbbf24] transition duration-200 flex items-center gap-2.5 group">
                                <i data-lucide="cake" class="w-4 h-4 text-[#fbbf24] group-hover:text-gray-500 transition-all duration-200 transform group-hover:translate-x-1 flex-shrink-0"></i>
                                <span>Produk Pilihan</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/#contact') }}" class="hover:text-[#fbbf24] transition duration-200 flex items-center gap-2.5 group">
                                <i data-lucide="phone" class="w-4 h-4 text-[#fbbf24] group-hover:text-gray-500 transition-all duration-200 transform group-hover:translate-x-1 flex-shrink-0"></i>
                                <span>Hubungi Kami</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-semibold mb-6 uppercase tracking-widest text-xs border-b border-white/5 pb-2 w-max pr-6">Info Toko</h4>
                    <ul class="space-y-4 text-sm text-gray-300">
                        <li class="flex items-start gap-3">
                            <i data-lucide="clock" class="w-4 h-4 text-[#fbbf24] mt-0.5 flex-shrink-0"></i>
                            <span class="leading-relaxed">Setiap Hari<br><span class="text-white font-medium">08.00 - 17.00 WIB</span></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i data-lucide="map-pin" class="w-4 h-4 text-[#fbbf24] mt-0.5 flex-shrink-0"></i>
                            <span class="leading-relaxed text-gray-400">Jombang, Jawa Timur,<br><span class="text-white font-medium">Indonesia</span></span>
                        </li>
                    </ul>
                </div>

            </div> </div> <div class="pt-8 border-t border-white/5 flex flex-col sm:flex-row justify-between items-center gap-4 pb-6 md:pb-0">
            <p class="text-gray-500 text-[11px] md:text-xs tracking-wide text-center sm:text-left">
                © 2026 <span class="text-gray-400 font-medium">Mak Len Cake & Cookies</span>. All rights reserved.
            </p>
            <div class="hidden md:flex text-gray-500 text-[10px] uppercase tracking-[2px] items-center gap-1 md:mr-16">
                Crafted with <span class="text-red-500/80 animate-pulse">♥</span> for sweetness
            </div>
        </div>

    </div>
</footer>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Cari semua link di dalam footer
    const footerLinks = document.querySelectorAll('footer a[href*="#"]');
    
    footerLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            
            // Jika link mengandung URL lengkap (bukan sekadar #about saja)
            if (href.includes('/') && !href.startsWith('#')) {
                // Hentikan intercept dari script smooth-scroll lain
                e.stopPropagation(); 
            }
        });
    });
});
document.addEventListener("DOMContentLoaded", function () {

    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    // ==========================================
    // DETEKSI DEVICE & AMBIL ELEMEN AMAN
    // ==========================================
    const isMobile = window.innerWidth < 768;

    // Ambil elemen pencarian sesuai device aktif
    const searchInput = isMobile ? document.getElementById('search-input-mobile') : document.getElementById('search-input');
    const suggestionBox = isMobile ? document.getElementById('search-suggestions-mobile') : document.getElementById('search-suggestions');
    
    // Tombol filter diambil semua (.filter-btn ada di mobile & desktop)
    const filterBtns = document.querySelectorAll('.filter-btn');

    let currentCategory = new URLSearchParams(window.location.search).get('category') || 'all';
    let debounceTimer;
    let suggestionTimer;
    let selectedIndex = -1;
    let suggestions = [];

    // ==========================================
    // RECENT SEARCH (LOCAL STORAGE)
    // ==========================================
    function saveRecent(keyword) {
        if (!keyword) return;
        let data = JSON.parse(localStorage.getItem('recent_search') || '[]');
        data = data.filter(i => i !== keyword);
        data.unshift(keyword);
        data = data.slice(0, 5);
        localStorage.setItem('recent_search', JSON.stringify(data));
    }

    function renderRecent() {
        // Arahkan render list ke container device masing-masing
        const box = isMobile ? document.getElementById('recent-list-mobile') : document.getElementById('recent-list');
        const wrapper = isMobile ? document.getElementById('recent-search-mobile') : document.getElementById('recent-search');

        if (!box || !wrapper) return;

        let data = JSON.parse(localStorage.getItem('recent_search') || '[]');

        if (!data.length) {
            wrapper.classList.add('hidden');
            return;
        }

        wrapper.classList.remove('hidden');

        box.innerHTML = data.map(item => `
            <span class="recent-item cursor-pointer px-3 py-1 bg-[#1a1a1a] rounded-full text-xs text-gray-300 hover:bg-[#fbbf24] hover:text-black transition">
                ${item}
            </span>
        `).join('');

        wrapper.querySelectorAll('.recent-item').forEach(el => {
            el.addEventListener('click', function () {
                if (searchInput) {
                    searchInput.value = this.innerText;
                    fetchProducts(this.innerText, currentCategory);
                }
            });
        });
    }

    renderRecent();

    // ==========================================
    // FETCH PRODUCTS (AJAX CORE PERBAIKAN)
    // ==========================================
    function fetchProducts(search = '', category = 'all') {
        // Tampilkan loading indicator sesuai device
        const loadingIndicator = document.getElementById(isMobile ? 'loading-indicator-mobile' : 'loading-indicator');
        const productWrapper = document.getElementById(isMobile ? 'product-wrapper-mobile' : 'product-wrapper');

        if (loadingIndicator) loadingIndicator.classList.remove('hidden');

        const params = new URLSearchParams();
        if (search) params.append('search', search);
        if (category !== 'all') params.append('category', category);

        saveRecent(search);

        fetch(`/katalog?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => res.text())
        .then(html => {
            const doc = new DOMParser().parseFromString(html, 'text/html');
            
            // Ambil data grid dari response server
            const newGridDesktop = doc.querySelector('#product-grid');

            if (newGridDesktop) {
                // SINKRONISASI MUTLAK: Masukkan datanya ke grid desktop DAN mobile sekaligus agar aman saat resize layar
                const targetDesktop = document.querySelector('#product-grid');
                const targetMobile = document.getElementById('product-grid-mobile');

                if (targetDesktop) targetDesktop.innerHTML = newGridDesktop.innerHTML;
                if (targetMobile) targetMobile.innerHTML = newGridDesktop.innerHTML;
            }

            window.history.pushState({}, '', `/katalog?${params.toString()}`);
            
            if (loadingIndicator) loadingIndicator.classList.add('hidden');
            if (typeof lucide !== 'undefined') lucide.createIcons();
        })
        .catch(err => {
            if (loadingIndicator) loadingIndicator.classList.add('hidden');
            console.error('Error fetching products:', err);
        });
    }

    // ==========================================
    // SEARCH SUGGESTIONS
    // ==========================================
    function fetchSuggestions(keyword) {
        if (!suggestionBox) return;

        if (!keyword || keyword.length < 1) {
            suggestionBox.classList.add('hidden');
            return;
        }

        clearTimeout(suggestionTimer);

        suggestionTimer = setTimeout(() => {
            fetch(`/search-suggestions?search=${encodeURIComponent(keyword)}`)
                .then(res => res.json())
                .then(data => {
                    suggestions = data;
                    selectedIndex = -1;

                    if (!data.length) {
                        suggestionBox.classList.add('hidden');
                        return;
                    }

                    suggestionBox.innerHTML = data.map((item, index) => {
                        const regex = new RegExp(`(${keyword})`, 'gi');
                        const highlighted = item.name.replace(
                            regex,
                            `<span class="text-[#fbbf24] font-bold">$1</span>`
                        );

                        return `
                        <div class="suggestion-item px-4 py-3 hover:bg-[#1a1a1a] cursor-pointer border-b border-white/5"
                             data-index="${index}"
                             data-name="${item.name}">
                            <div class="text-sm text-white font-medium">${highlighted}</div>
                            <div class="text-xs text-gray-500">${item.category?.name || ''}</div>
                        </div>`;
                    }).join('');

                    suggestionBox.classList.remove('hidden');
                });
        }, 150);
    }

    function selectSuggestion(index) {
        if (!suggestions[index] || !searchInput || !suggestionBox) return;
        const item = suggestions[index];
        searchInput.value = item.name;
        suggestionBox.classList.add('hidden');
        fetchProducts(item.name, currentCategory);
    }

    // ==========================================
    // INPUT EVENT (OTOMATIS RESET KATATEGORI SAAT MENGETIK)
    // ==========================================
    if (searchInput) {
        searchInput.addEventListener('input', function () {
            const keyword = this.value.trim();
            fetchSuggestions(keyword);

            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                if (keyword.length >= 2 || keyword.length === 0) {
                    
                    // ✨ SOLUSI: Jika user mengetik sesuatu, paksa kategori kembali ke 'all'
                    if (keyword.length > 0) {
                        currentCategory = 'all';
                        
                        // Kembalikan visual tombol filter ke "Semua Menu"
                        filterBtns.forEach(b => {
                            if (b.dataset.category === 'all') {
                                b.classList.add('bg-[#fbbf24]', 'text-black', 'font-bold');
                                b.classList.remove('text-gray-400', 'font-semibold');
                            } else {
                                b.classList.remove('bg-[#fbbf24]', 'text-black', 'font-bold');
                                b.classList.add('text-gray-400', 'font-semibold');
                            }
                        });
                    }

                    // Jalankan fungsi fetch dengan kategori yang sudah di-reset
                    fetchProducts(keyword, currentCategory);
                }
            }, 400);
        });

        // Event saat klik enter (Pastikan kategori ikut sinkron jika direset)
        searchInput.addEventListener('keydown', function (e) {
            if (!suggestionBox) return;
            const items = suggestionBox.querySelectorAll('.suggestion-item');

            if (e.key === 'ArrowDown') {
                selectedIndex = Math.min(selectedIndex + 1, items.length - 1);
            }
            if (e.key === 'ArrowUp') {
                selectedIndex = Math.max(selectedIndex - 1, 0);
            }
            if (e.key === 'Enter') {
                if (selectedIndex >= 0) {
                    selectSuggestion(selectedIndex);
                } else {
                    suggestionBox.classList.add('hidden');
                    
                    // Jaga konsistensi reset kategori saat enter
                    if (this.value.trim().length > 0) {
                        currentCategory = 'all';
                    }
                    fetchProducts(this.value, currentCategory);
                }
                return;
            }

            items.forEach((el, i) => {
                el.classList.toggle('bg-[#1a1a1a]', i === selectedIndex);
            });
        });
    }

    // ==========================================
    // CLICK SUGGESTION (SINKRONISASI RESET KATATEGORI)
    // ==========================================
    document.addEventListener('click', function (e) {
        if (!suggestionBox || !searchInput) return;

        const item = e.target.closest('.suggestion-item');
        if (item) {
            searchInput.value = item.dataset.name;
            suggestionBox.classList.add('hidden');
            
            // ✨ Reset kategori ke 'all' saat rekomendasi dropdown diklik
            currentCategory = 'all';
            filterBtns.forEach(b => {
                if (b.dataset.category === 'all') {
                    b.classList.add('bg-[#fbbf24]', 'text-black', 'font-bold');
                    b.classList.remove('text-gray-400', 'font-semibold');
                } else {
                    b.classList.remove('bg-[#fbbf24]', 'text-black', 'font-bold');
                    b.classList.add('text-gray-400', 'font-semibold');
                }
            });

            fetchProducts(item.dataset.name, currentCategory);
        }

        if (!searchInput.contains(e.target) && !suggestionBox.contains(e.target)) {
            suggestionBox.classList.add('hidden');
        }
    });

    // ==========================================
    // CATEGORY FILTER (SINKRON DESKTOP & MOBILE)
    // ==========================================
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            const selectedCategory = this.dataset.category;
            currentCategory = selectedCategory;

            // Perbarui status kelas aktif di SEMUA tombol (baik di baris mobile maupun desktop)
            filterBtns.forEach(b => {
                if (b.dataset.category === selectedCategory) {
                    b.classList.add('bg-[#fbbf24]', 'text-black', 'font-bold');
                    b.classList.remove('text-gray-400', 'font-semibold');
                } else {
                    b.classList.remove('bg-[#fbbf24]', 'text-black', 'font-bold');
                    b.classList.add('text-gray-400', 'font-semibold');
                }
            });

            // Jalankan pencarian AJAX
            const currentSearchValue = searchInput ? searchInput.value : '';
            fetchProducts(currentSearchValue, currentCategory);
        });
    });

});
</script>

@endsection