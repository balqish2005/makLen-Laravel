@extends('frontend.layouts.app')

@section('content')

@php use Illuminate\Support\Str; @endphp

<style>
    html {
        scroll-behavior: smooth !important;
    }

    body {
        background-color: #0f0f0f;
        color: white;
        font-family: 'Inter', sans-serif;
        -webkit-overflow-scrolling: touch;
    }

    .gold {
        color: #fbbf24;
    }

    .bg-gold {
        background-color: #fbbf24;
    }

    .card-product {
        background: #1a1a1a;
        border: 1px solid #2a2a2a;
        transition: 0.3s;
    }

    .card-product:hover {
        transform: translateY(-5px);
        border-color: #fbbf24;
    }

    /* Base class untuk sistem slide */
    .slide-hp, .slide-desktop {
        opacity: 0;
        transition: opacity 0.8s ease-in-out;
        position: absolute;
        inset: 0;
        pointer-events: none;
    }

    .slide-hp.active, .slide-desktop.active {
        opacity: 1;
        z-index: 10;
        pointer-events: auto;
    }
</style>

<!-- ==================== SECTION HOME ==================== -->
<section id="home" class="relative overflow-hidden w-full bg-black">

    <!-- TAMPILAN KHUSUS MOBILE -->
    <div class="block md:hidden w-full h-[240px] relative overflow-hidden">
        
        <!-- SLIDE 1 -->
        <div class="slide-hp active flex items-center justify-center">
            <img src="{{ asset('images/banner2.png') }}" class="w-full h-full object-cover transform translate-z-0 will-change-transform">
            <div class="absolute inset-0 bg-black/60"></div>
            
            <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-6 z-20">
                <!-- 1. Tagline Utama Mak Len -->
                <h1 class="text-lg font-bold leading-tight uppercase tracking-wide">
                    Ada Kualitas di <span class="gold">Setiap Remahannya</span>
                </h1>
                
                <!-- Pembatas Garis Tipis yang Estetik -->
                <div class="w-12 h-[1px] bg-[#fbbf24]/50 my-2.5"></div>
                
                <!-- 2. Blok Informasi Toko (Jam Buka) -->
                <div class="flex flex-col gap-2 text-gray-200 text-[11px] leading-relaxed max-w-xs">
                    <div class="flex items-center justify-center gap-1.5 font-medium text-white">
                        <i data-lucide="clock" class="w-3.5 h-3.5 text-[#fbbf24]"></i>
                        <span>Buka Setiap Hari: <span class="text-[#fbbf24]">08.00 - 17.00 WIB</span></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- SLIDE 2 -->
        <div class="slide-hp flex items-center justify-center">
            <img src="{{ asset('images/banner_about.png') }}" class="w-full h-full object-cover transform translate-z-0 will-change-transform">
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-4 z-20">
                <h1 class="text-xl font-bold leading-tight">Sweet Cake <span class="gold">Collection</span></h1>
                <p class="text-gray-300 mt-1 max-w-sm text-[10px] leading-snug">Cake spesial untuk berbagai momen bahagia kamu.</p>
                <div class="flex gap-2 mt-3 w-full justify-center">
                    <a href="#contact" class="bg-gold text-black px-3 py-1.5 rounded-md font-bold text-[10px]">Pesan</a>
                    <a href="{{ route('products.index') }}" class="border border-white px-3 py-1.5 rounded-md font-medium text-[10px]">Explore</a>
                </div>
            </div>
        </div>

        <!-- ⚪ INDICATOR DOTS (Lingkaran Kecil Penanda Slide Mobile) -->
        <div class="absolute bottom-3 left-1/2 transform -translate-x-1/2 flex gap-1.5 z-30 bg-black/20 px-2.5 py-1 rounded-full backdrop-blur-[2px]">
            <!-- Dot untuk Slide 1 (Beri ID/Class penanda aktif bawaan) -->
            <span class="dot-hp-indicator w-1.5 h-1.5 rounded-full bg-[#fbbf24] transition-all duration-300"></span>
            <!-- Dot untuk Slide 2 (Default redup transparan) -->
            <span class="dot-hp-indicator w-1.5 h-1.5 rounded-full bg-white/40 transition-all duration-300"></span>
        </div>

    </div>

    <!-- TAMPILAN KHUSUS DESKTOP -->
    <div class="hidden md:block h-[100vh] w-full relative">
        
        <div class="slide-desktop active">
            <img src="{{ asset('images/banner2.png') }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/60"></div>
            <div class="absolute inset-0 flex flex-col justify-center items-start text-left px-16 z-20">
                <p class="uppercase tracking-[5px] text-yellow-400 text-sm mb-3">Premium Bakery</p>
                <h1 class="text-6xl font-bold leading-tight max-w-2xl">Fresh Bakery <span class="gold">Everyday</span></h1>
                <p class="text-gray-300 mt-4 max-w-xl text-lg leading-relaxed">Nikmati roti premium, pastry lembut, dan snack pilihan terbaik setiap hari hanya di Mak Len cake & cookies.</p>
                <div class="flex gap-4 mt-8">
                    <a href="#contact" class="bg-gold text-black px-6 py-3 rounded-lg font-semibold hover:scale-105 transition block text-center">Order Sekarang</a>
                    <a href="{{ route('products.index') }}" class="border border-white px-6 py-3 rounded-lg hover:bg-white hover:text-black transition block text-center">Lihat Menu</a>
                </div>
            </div>
        </div>

        <div class="slide-desktop">
            <img src="{{ asset('images/banner_about.png') }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/60"></div>
            <div class="absolute inset-0 flex flex-col justify-center items-start text-left px-16 z-20">
                <p class="uppercase tracking-[5px] text-yellow-400 text-sm mb-3">Special Cake</p>
                <h1 class="text-6xl font-bold leading-tight max-w-2xl">Sweet Cake <span class="gold">Collection</span></h1>
                <p class="text-gray-300 mt-4 max-w-xl text-lg leading-relaxed">Cake spesial untuk ulang tahun, anniversary, dan berbagai momen bahagia kamu.</p>
                <div class="flex gap-4 mt-8">
                    <a href="#contact" class="bg-gold text-black px-6 py-3 rounded-lg font-semibold hover:scale-105 transition block text-center">Pesan Cake</a>
                    <a href="{{ route('products.index') }}" class="border border-white px-6 py-3 rounded-lg hover:bg-white hover:text-black transition block text-center">Explore</a>
                </div>
            </div>
        </div>

        <button onclick="changeSlideDesktop(-1)" class="absolute left-5 top-1/2 -translate-y-1/2 z-30 bg-black/40 hover:bg-black/70 w-12 h-12 rounded-full text-xl flex items-center justify-center text-white focus:outline-none">❮</button>
        <button onclick="changeSlideDesktop(1)" class="absolute right-5 top-1/2 -translate-y-1/2 z-30 bg-black/40 hover:bg-black/70 w-12 h-12 rounded-full text-xl flex items-center justify-center text-white focus:outline-none">❯</button>
    </div>

</section>

<!-- ==================== SECTION ABOUT  ==================== -->
<section id="about" class="bg-black overflow-hidden">

    <!-- 📱 TAMPILAN KHUSUS MOBILE (DESAIN 3 LAYER SEPERTI REFERENSI) -->
    <div class="block md:hidden bg-black">
        
        <!-- --- LAYER 2: ABOUT US (Dibuat Lebih Pendek & Compact khusus Mobile) --- -->
        <div class="px-6 py-8 bg-black"> <!-- Padding vertikal dikurangi dari py-12 ke py-8 -->
            <div class="max-w-md mx-auto">
                
                <!-- Grid 2 Kolom Kiri-Kanan -->
                <div class="grid grid-cols-12 gap-4 items-stretch">
                    
                    <!-- SISI KIRI: Foto Roti Utama (Tinggi dipotong jadi h-[170px] agar lebih ceper) -->
                    <div class="col-span-5">
                        <div class="w-full h-[190px] rounded-xl overflow-hidden shadow-xl border border-white/5">
                            <img src="{{ asset('images/about_us.jpg') }}" class="w-full h-full object-cover">
                        </div>
                    </div>

                    <!-- SISI KANAN: Konten Judul, Teks Ringkas, dan Tombol Selengkapnya -->
                    <div class="col-span-7 pl-1 flex flex-col justify-between">
                        <div>
                            <!-- Sub-title Kecil Elegan -->
                            <p class="uppercase tracking-[3px] text-[#fbbf24] text-[9px] font-semibold mb-0.5">
                                About Us
                            </p>
                            
                            <!-- Nama Brand Utama (Margin dikurangi agar makin rapat) -->
                            <div class="mb-1.5 select-none">
                                <h2 style="font-family: 'Yellowtail', cursive;" class="text-3xl text-[#fbbf24] leading-none">
                                    makLen
                                </h2>
                                <h3 style="font-family: 'Montserrat', sans-serif;" class="uppercase tracking-[0.15em] text-[9px] font-extrabold text-white/90 mt-0.5">
                                    cake & cookies
                                </h3>
                            </div>
                            
                            <!-- Garis Dekorasi Minimalis -->
                            <div class="w-12 h-[2px] bg-[#fbbf24] mb-2 rounded-full"></div>
                            
                            <!-- Paragraf Deskripsi: Dibuat super padat & ukuran text-[10px] -->
                            <div class="text-gray-300 text-[10px] leading-relaxed font-light mb-2">
                                <p>
                                    Mak Len Cake & Cookies menghadirkan aneka roti, cake, dan cookies premium yang dibuat fresh setiap hari untuk kehangatan momen bahagia Anda.
                                </p>
                            </div>
                        </div>

                        <!-- TOMBOL AKSI: Ukuran disesuaikan agar proporsional dengan teks baru -->
                        <div class="pt-1">
                            <a href="{{ route('about') }}" class="inline-block bg-[#fbbf24] text-black px-3.5 py-1.5 rounded-lg font-bold text-[9px] shadow-md active:scale-95 transition tracking-wide">
                                Selengkapnya
                            </a>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>

        <!-- --- LAYER 3: SPECIAL ORDER / PESANAN KHUSUS (Mengadopsi gaya layer ke-3 image_b52c1d.jpg) --- -->
        <div class="relative w-full h-[260px] flex items-center justify-center overflow-hidden border-t border-b border-white/5">
            <!-- Background Gambar Full seperti referensi -->
            <img src="{{ asset('images/roti_kacang_merah.jpg') }}" class="absolute inset-0 w-full h-full object-cover">
            <!-- Overlay gelap tipis agar teks pigura di tengah menonjol -->
            <div class="absolute inset-0 bg-black/60"></div>

            <!-- Kartu Teks di Tengah dengan Border Bergerigi/Garis Elegan khas MakLen -->
            <div class="relative z-10 w-[88%] bg-black/80 backdrop-blur-md rounded-2xl p-5 border border-[#fbbf24]/40 text-center shadow-2xl">
                <!-- Penyematan Logo MakLen di atas judul -->
                <div class="flex flex-col items-center mb-1 select-none">
                    <h4 style="font-family: 'Yellowtail', cursive;" class="text-2xl text-[#fbbf24] leading-none">makLen</h4>
                    <span class="text-[7px] tracking-[0.3em] uppercase text-gray-400 font-bold -mt-0.5">Special Order</span>
                </div>

                <p class="text-gray-300 text-[10px] leading-relaxed max-w-xs mx-auto mt-2 font-light">
                    Menerima pesanan khusus untuk kue hantaran, snack box, ulang tahun, dan berbagai momen bahagia Anda dengan dekorasi kustom.
                </p>

                <!-- Tombol Aksi Pesan Sekarang di dalam kartu -->
                <div class="mt-4">
                    <a href="#contact" class="inline-block border border-[#fbbf24] text-[#fbbf24] hover:bg-[#fbbf24] hover:text-black px-5 py-1.5 rounded-lg font-bold text-[9px] uppercase tracking-wider transition duration-300 active:scale-95">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- 💻 TAMPILAN DESKTOP ASLI (Sama sekali tidak diganggu gugat, Sesuai Kode Awal Kamu) -->
    <div class="hidden md:block max-w-7xl mx-auto px-16 py-24">
        <div class="max-w-7xl mx-auto flex flex-col md:grid md:grid-cols-2 gap-10 md:gap-14 items-center">
            
            <div class="relative w-full px-2 md:px-0">
                <img src="{{ asset('images/about_us.jpg') }}" class="w-full h-[320px] sm:h-[400px] md:h-[500px] object-cover rounded-3xl shadow-2xl">
                
                <div class="absolute -bottom-4 -right-2 md:-bottom-6 md:-right-6 w-28 h-28 md:w-40 md:h-40 rounded-2xl md:rounded-3xl overflow-hidden border-4 border-[#fbbf24] shadow-2xl">
                    <img src="{{ asset('images/roti_kacang_merah.jpg') }}" class="w-full h-full object-cover">
                </div>
            </div>

            <div class="w-full mt-6 md:mt-0 flex flex-col items-center text-center md:items-start md:text-left px-2 md:px-0">
                <p class="uppercase tracking-[4px] md:tracking-[5px] text-[#fbbf24] text-xs md:text-sm mb-3 md:mb-4 font-semibold">
                    About Us
                </p>
                
                <div class="mb-4 md:mb-6 flex flex-col items-center md:items-start select-none">
                    <h2 style="font-family: 'Yellowtail', cursive;" class="text-5xl md:text-7xl text-[#fbbf24] leading-none">
                        makLen
                    </h2>
                    <h3 style="font-family: 'Montserrat', sans-serif;" class="uppercase tracking-[0.2em] md:tracking-[0.25em] text-sm md:text-2xl font-extrabold text-[#fbbf24] mt-1 md:mt-[-10px]">
                        cake & cookies
                    </h3>
                </div>
                
                <div class="w-24 md:w-32 h-[3px] bg-[#fbbf24] mb-6 md:mb-8 rounded-full"></div>
                
                <div class="space-y-4 text-gray-300 leading-relaxed text-sm md:text-lg mb-6 md:mb-8 max-w-xl md:max-w-none">
                    <p>
                        Mak Len Cake & Cookies hadir untuk menghadirkan roti, cake, dan cookies premium dengan cita rasa terbaik dan kualitas bahan pilihan. Setiap produk dibuat fresh setiap hari dengan penuh perhatian pada rasa dan detail.
                    </p>
                    <p class="text-gray-400">
                        Kami believe bahwa setiap gigitan membawa kebahagiaan. Mulai dari cake hantaran, pastry lembut, hingga cookies favorit keluarga, semuanya dibuat dengan resep spesial yang menghadirkan rasa hangat dan manis di setiap momen.
                    </p>
                </div>
                
                <a href="{{ route('about') }}" class="inline-block bg-[#fbbf24] text-black px-6 py-3 md:px-7 md:py-3 rounded-xl font-bold hover:scale-105 transition duration-300 shadow-lg shadow-yellow-500/20 text-xs md:text-base">
                    Selengkapnya
                </a>
            </div>

        </div>
    </div>

</section>

<!-- ==================== SECTION PRODUCTS (FULL PORTRAIT CARD) ==================== -->
<section id="products" class="bg-black relative overflow-hidden">

    <!-- 📱 TAMPILAN KHUSUS MOBILE (block md:hidden) -->
    <!-- Dioptimalkan khusus untuk HP: Card lebih kecil, Header Tengah, Lihat Katalog Kiri -->
    <div class="block md:hidden pt-12 pb-6 px-6">
        <div class="max-w-md mx-auto">
            
            <!-- 1 & 2. RE-LAYOUT HEADER MOBILE -->
            <div class="flex flex-col mb-6 px-1">
                <!-- Judul Utama diletakkan di TENGAH -->
                <div class="text-center w-full mb-3 select-none">
                    <p class="text-[#fbbf24] text-[9px] uppercase tracking-[0.2em] font-semibold mb-0.5">
                        Pilihan Terbaik
                    </p>
                    <h2 class="text-xl font-bold text-white leading-tight" style="font-family: 'Montserrat', sans-serif;">
                        Produk <span class="text-[#fbbf24]">Terlaris</span>
                    </h2>
                </div>
                
                <!-- Tombol Lihat Katalog diletakkan RATA KANAN -->
                <div class="text-right w-full border-b border-white/5 pb-2">
                    <a href="{{ route('products.index') }}" class="inline-flex items-center gap-1 text-[11px] text-[#fbbf24] font-bold tracking-wide transition active:scale-95">
                        Lihat Katalog <span class="text-xs">→</span>
                    </a>
                </div>
            </div>

            <!-- 3. SLIDER DENGAN CARD YANG LEBIH DIKECILKAN LAGI -->
            <div class="flex overflow-x-auto gap-3 pb-4 snap-x snap-mandatory scrollbar-hide" style="-ms-overflow-style: none; scrollbar-width: none;">
                <style>
                    .scrollbar-hide::-webkit-scrollbar { display: none; }
                </style>

                @forelse($products as $p)
                    <!-- Ukuran Card diperkecil lagi (min-w-[165px] max-w-[175px]) agar lebih ramping & compact -->
                    <div class="min-w-[165px] max-w-[175px] bg-[#1a1a1a] border border-[#2a2a2a] rounded-xl overflow-hidden snap-start flex flex-col justify-between shadow-lg">
                        <div>
                            <!-- Wadah Foto Portrait Proporsional yang Lebih Ramping (h-48) -->
                            <div class="overflow-hidden h-48 w-full bg-[#111] relative">
                                @if($p->image)
                                    <img src="{{ asset('storage/' . $p->image) }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-600 text-[10px]">No Image</div>
                                @endif
                            </div>
                            
                            <!-- Konten Card Super Padat -->
                            <div class="p-2.5">
                                <span class="text-[7.5px] bg-[#fbbf24] text-black px-2 py-0.5 rounded-full font-extrabold uppercase tracking-wider">
                                    {{ $p->category->name ?? 'Bakery' }}
                                </span>
                                <h3 class="text-white font-bold text-xs mt-2 truncate">{{ $p->name }}</h3>
                                <p class="text-gray-400 text-[9px] mt-0.5 line-clamp-2 leading-relaxed">{{ $p->description }}</p>
                            </div>
                        </div>
                        
                        <!-- Bagian Harga & Tombol Pesan (Kembali Sejajar Kiri-Kanan) -->
                        <div class="p-2.5 pt-0 mt-0.5">
                            <div class="flex justify-between items-center border-t border-white/5 pt-2">
                                <!-- Harga -->
                                <span class="text-[#fbbf24] font-bold text-[11px] shrink-0">
                                    Rp {{ number_format($p->price) }}
                                </span>
                                
                                <!-- Tombol Pesan Ramping -->
                                <a href="https://wa.me/6282232321112?text={{ rawurlencode("Halo MakLen, saya tertarik dengan produk " . $p->name . ".\nDeskripsi: " . $p->description . ".\nHarga: Rp " . number_format($p->price)) }}" target="_blank" class="bg-[#fbbf24] text-black text-xs md:text-sm px-4 py-2 rounded-xl font-bold hover:bg-yellow-400 transition-all duration-300 shadow-md">Pesan</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="w-full text-center py-10 text-gray-500">
                        <p class="text-xs">Belum ada produk unggulan yang di-publish.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>


    <!-- 💻 TAMPILAN KHUSUS DESKTOP (hidden md:block) -->
    <!-- Gambar disesuaikan menjadi Portrait Elegan (md:h-96) tanpa mengubah sisa card -->
    <div class="hidden md:block py-16 md:py-20 px-4 sm:px-8 md:px-16">
        <div class="max-w-7xl mx-auto relative group">
            
            <div class="flex justify-between items-end mb-6 md:mb-10 px-2 md:px-0 relative z-30 w-full">
                <div>
                    <p class="text-[#fbbf24] text-[10px] md:text-xs uppercase tracking-[0.2em] font-semibold mb-1">
                        Pilihan Terbaik
                    </p>
                    <h2 class="text-2xl md:text-4xl font-bold text-white leading-tight" style="font-family: 'Montserrat', sans-serif;">
                        Our <span class="text-[#fbbf24]">Products</span>
                    </h2>
                </div>
                
                <a href="{{ route('products.index') }}" class="text-[11px] md:text-sm text-[#fbbf24] hover:text-yellow-300 flex items-center gap-1 font-bold transition group/link pb-1 shrink-0 whitespace-nowrap">
                    Lihat Semua Menu<span class="transition-transform duration-300 group-hover/link:translate-x-1">→</span>
                </a>
            </div>

            <!-- Tombol Navigasi Slider Desktop (Posisi Top disesuaikan ke 50% karena card memanjang) -->
            <button id="slideLeft" class="hidden md:flex absolute left-[-20px] top-[50%] -translate-y-1/2 z-20 bg-[#1a1a1a]/80 backdrop-blur-md border border-white/10 text-white w-12 h-12 rounded-full items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 hover:bg-[#fbbf24] hover:text-black shadow-lg">❮</button>
            <button id="slideRight" class="hidden md:flex absolute right-[-20px] top-[50%] -translate-y-1/2 z-20 bg-[#1a1a1a]/80 backdrop-blur-md border border-white/10 text-white w-12 h-12 rounded-full items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 hover:bg-[#fbbf24] hover:text-black shadow-lg">❯</button>

            <div id="productSlider" class="flex overflow-x-auto gap-4 md:gap-6 pb-6 snap-x snap-mandatory scroll-smooth scrollbar-hide px-2 md:px-0" style="-ms-overflow-style: none; scrollbar-width: none;">
                @forelse($products as $p)
                    <div class="min-w-[270px] sm:min-w-[290px] md:min-w-[300px] bg-[#1a1a1a] border border-[#2a2a2a] rounded-2xl overflow-hidden snap-start flex flex-col justify-between transition-all duration-300 hover:border-[#fbbf24] hover:-translate-y-1 shadow-xl">
                        <div>
                            <!-- WADAH FOTO DESKTOP: Diubah dari h-52 menjadi md:h-96 agar berwujud Portrait Premium -->
                            <div class="overflow-hidden h-52 md:h-96 w-full bg-[#111] relative group/img">
                                @if($p->image)
                                    <img src="{{ asset('storage/' . $p->image) }}" class="w-full h-full object-cover transition-transform duration-500 group-hover/img:scale-110">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-600 text-xs">No Image</div>
                                @endif
                            </div>
                            
                            <div class="p-4 md:p-5">
                                <span class="text-[9px] md:text-[10px] bg-[#fbbf24] text-black px-2.5 py-1 rounded-full font-extrabold uppercase tracking-wider">
                                    {{ $p->category->name ?? 'Bakery' }}
                                </span>
                                <h3 class="text-white font-bold text-base md:text-lg mt-3 truncate">{{ $p->name }}</h3>
                                <p class="text-gray-400 text-xs md:text-sm mt-1 line-clamp-2 leading-relaxed">{{ $p->description }}</p>
                            </div>
                        </div>
                        
                        <div class="p-4 md:p-5 pt-0 mt-1">
                            <div class="flex justify-between items-center border-t border-white/5 pt-3 md:pt-4">
                                <span class="text-[#fbbf24] font-bold text-base md:text-lg">Rp {{ number_format($p->price) }}</span>
                                <a href="https://wa.me/6282232321112?text={{ rawurlencode("Halo MakLen, saya tertarik dengan produk " . $p->name . ".\nDeskripsi: " . $p->description . ".\nHarga: Rp " . number_format($p->price)) }}" target="_blank" class="bg-[#fbbf24] text-black text-xs md:text-sm px-4 py-2 rounded-xl font-bold hover:bg-yellow-400 transition-all duration-300 shadow-md">Pesan</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="w-full text-center py-12 text-gray-500 col-span-full">
                        <p class="text-sm">Belum ada produk unggulan yang di-publish.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>

</section>

<!-- ==================== SECTION CONTACT (SPLIT DEVICE) ==================== -->
<section id="contact" class="bg-black">

    <!-- 📱 TAMPILAN KHUSUS MOBILE (block md:hidden) -->
    <!-- Elemen teks, card WA/IG, dan peta disesuaikan menjadi super compact & terpusat -->
    <div class="block md:hidden px-6 pt-6 pb-12 text-center">
        <div class="max-w-md mx-auto">
            
            <!-- 1. HEADER TEXT MOBILE (DI-PERKECIL & TETAP DI TENGAH) -->
            <p class="uppercase tracking-[3px] text-[#fbbf24] text-[10px] mb-1 font-semibold">Contact Us</p>
            <h2 class="text-2xl font-bold mb-3 text-white">Hubungi <span class="text-[#fbbf24]">Mak Len Bakery</span></h2>
            <p class="text-gray-400 max-w-xs mx-auto mb-8 text-[11px] leading-relaxed">
                Silakan hubungi kami untuk pemesanan cake, cookies, atau custom order. Kami siap melayani Anda setiap hari.
            </p>

            <!-- 2. UKURAN CARD DIPERKECIL (WA, IG, MAPS) -->
            <div class="flex flex-col gap-4">
                
                <!-- CARD WHATSAPP COMPACT -->
                <div class="bg-[#1a1a1a] border border-[#2a2a2a] rounded-xl py-4 px-4 flex flex-col items-center justify-between shadow-md">
                    <div class="flex items-center gap-3 w-full text-left">
                        <div class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center border border-white/10 shrink-0">
                            <i class="fa-brands fa-whatsapp text-[#fbbf24] text-lg"></i>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-white">WhatsApp</h3>
                            <p class="text-gray-400 text-[10px] leading-tight">Chat langsung untuk order cepat & custom menu</p>
                        </div>
                    </div>
                    <a href="https://wa.me/6282232321112?text=Halo%20MakLen,%20saya%20ingin%20pesan%20cake" target="_blank" class="w-full text-center border border-[#fbbf24] text-[#fbbf24] px-4 py-1.5 rounded-lg font-bold tracking-wide text-[10px] mt-3 active:scale-95 transition">
                        Chat Sekarang
                    </a>
                </div>

                <!-- CARD INSTAGRAM COMPACT -->
                <div class="bg-[#1a1a1a] border border-[#2a2a2a] rounded-xl py-4 px-4 flex flex-col items-center justify-between shadow-md">
                    <div class="flex items-center gap-3 w-full text-left">
                        <div class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center border border-white/10 shrink-0">
                            <i class="fa-brands fa-instagram text-[#fbbf24] text-lg"></i>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-white">Instagram</h3>
                            <p class="text-gray-400 text-[10px] leading-tight">Lihat katalog update & produk terbaru kami</p>
                        </div>
                    </div>
                    <a href="https://www.instagram.com/thomaajeng/" target="_blank" class="w-full text-center border border-[#fbbf24] text-[#fbbf24] px-4 py-1.5 rounded-lg font-bold tracking-wide text-[10px] mt-3 active:scale-95 transition">
                        Follow Kami
                    </a>
                </div>

                <!-- CARD LOKASI / MAPS COMPACT -->
                <div class="bg-[#1a1a1a] border border-[#2a2a2a] rounded-xl p-4 shadow-md text-left">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center border border-white/10 shrink-0">
                            <i data-lucide="map-pin" class="w-4 h-4 text-[#fbbf24]"></i>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-white">Lokasi Toko</h3>
                            <p class="text-gray-400 text-[10px] leading-tight line-clamp-1">Perum sambong indah, blok A1, Sambong Dukuh, Jombang</p>
                        </div>
                    </div>
                    <!-- Tinggi Iframe Peta Dibuat Lebih Ringkas (h-28) -->
                    <div class="w-full h-28 rounded-lg overflow-hidden border border-white/5 relative">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.4395609236794!2d112.22369347357571!3d-7.526940974279347!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e783f1efd109215%3A0x29a6bebd0323a17a!2sMak%20Len%20cake%20%26%20cookies!5e0!3m2!1sid!2sid!4v1780215885251!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full h-full border-0 grayscale-[30%] contrast-[110%] invert-[90%] hue-rotate-[180deg] opacity-80" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

            </div>

        </div>
    </div>


    <!-- 💻 TAMPILAN KHUSUS DESKTOP (hidden md:block) -->
    <!-- Tetap menggunakan susunan grid asli milikmu tanpa perubahan apa pun -->
    <div class="hidden md:block px-6 md:px-16 py-20 text-center">
        <div class="max-w-7xl mx-auto">
            <p class="uppercase tracking-[5px] text-[#fbbf24] text-sm mb-3 font-semibold">Contact Us</p>
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Hubungi <span class="text-[#fbbf24]">Mak Len Bakery</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto mb-12 text-sm md:text-base">Silakan hubungi kami untuk pemesanan cake, cookies, atau custom order. Kami siap melayani kamu setiap hari.</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch">
                <div class="bg-[#1a1a1a] border border-[#2a2a2a] rounded-2xl p-6 hover:border-[#fbbf24] transition flex flex-col justify-between items-center min-h-[340px]">
                    <div class="my-auto">
                        <div class="flex justify-center mb-4">
                            <div class="w-16 h-16 rounded-full bg-white/5 flex items-center justify-center border border-white/10">
                                <i class="fa-brands fa-whatsapp text-[#fbbf24] text-3xl"></i>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-white">WhatsApp</h3>
                        <p class="text-gray-400 text-sm max-w-[200px] mx-auto">Chat langsung untuk order cepat & custom menu</p>
                    </div>
                    <a href="https://wa.me/6282232321112?text=Halo%20MakLen,%20saya%20ingin%20pesan%20cake" target="_blank" class="w-full border border-[#fbbf24] text-[#fbbf24] hover:bg-[#fbbf24] hover:text-black px-5 py-2.5 rounded-xl font-bold transition duration-300 tracking-wide text-sm mt-4">Chat Sekarang</a>
                </div>

                <div class="bg-[#1a1a1a] border border-[#2a2a2a] rounded-2xl p-6 hover:border-[#fbbf24] transition flex flex-col justify-between items-center min-h-[340px]">
                    <div class="my-auto">
                        <div class="flex justify-center mb-4">
                            <div class="w-16 h-16 rounded-full bg-white/5 flex items-center justify-center border border-white/10">
                                <i class="fa-brands fa-instagram text-[#fbbf24] text-3xl"></i>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-white">Instagram</h3>
                        <p class="text-gray-400 text-sm max-w-[200px] mx-auto">Lihat katalog update & produk terbaru kami</p>
                    </div>
                    <a href="https://www.instagram.com/thomaajeng/" target="_blank" class="w-full border border-[#fbbf24] text-[#fbbf24] hover:bg-[#fbbf24] hover:text-black px-5 py-2.5 rounded-xl font-bold transition duration-300 tracking-wide text-sm mt-4">Follow Kami</a>
                </div>

                <div class="bg-[#1a1a1a] border border-[#2a2a2a] rounded-2xl p-5 hover:border-[#fbbf24] transition flex flex-col justify-between min-h-[340px]">
                    <div>
                        <div class="flex justify-center mb-3">
                            <div class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center border border-white/10">
                                <i data-lucide="map-pin" class="w-5 h-5 text-[#fbbf24]"></i>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold mb-1 text-white">Lokasi Toko</h3>
                        <p class="text-gray-400 text-xs max-w-[240px] mx-auto line-clamp-2">Perum sambong indah, blok A1, Sambong Dukuh, Jombang</p>
                    </div>
                    <div class="w-full h-40 rounded-xl overflow-hidden border border-white/5 mt-4 relative">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.4395609236794!2d112.22369347357571!3d-7.526940974279347!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e783f1efd109215%3A0x29a6bebd0323a17a!2sMak%20Len%20cake%20%26%20cookies!5e0!3m2!1sid!2sid!4v1780215885251!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full h-full border-0 grayscale-[30%] contrast-[110%] invert-[90%] hue-rotate-[180deg] opacity-80 hover:opacity-100 transition duration-300" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- ==================== FOOTER ==================== -->
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

<script src="https://unpkg.com/lucide@latest"></script>

<script>
    // 1. SISTEM SLIDER HP (Terpisah Mandiri - Anti-Flicker)
    let currentHpIndex = 0;
    const slidesHp = document.querySelectorAll('.slide-hp');

    function showSlideHp(index) {
        if (slidesHp.length === 0) return;
        slidesHp.forEach(slide => slide.classList.remove('active'));
        
        currentHpIndex = index;
        if (currentHpIndex >= slidesHp.length) currentHpIndex = 0;
        if (currentHpIndex < 0) currentHpIndex = slidesHp.length - 1;
        
        slidesHp[currentHpIndex].classList.add('active');

        // 🌟 SCRIPT BARU: Update warna lingkaran kecil indikator mobile
        const dotsHp = document.querySelectorAll('.dot-hp-indicator');
        if (dotsHp.length > 0) {
            dotsHp.forEach((dot, dotIndex) => {
                if (dotIndex === currentHpIndex) {
                    dot.classList.remove('bg-white/40');
                    dot.classList.add('bg-[#fbbf24]'); // Warna emas untuk slide aktif
                } else {
                    dot.classList.remove('bg-[#fbbf24]');
                    dot.classList.add('bg-white/40');  // Warna redup untuk slide pasif
                }
            });
        }
    }

    function changeSlideHp(direction) {
        showSlideHp(currentHpIndex + direction);
    }

    // 📱 FITUR SWIPE MOBILE OTOMATIS (Membaca Geseran Jari User Tanpa Mengubah HTML Banner)
    document.addEventListener("DOMContentLoaded", function () {
        // Cari elemen pembungkus luar banner mobile kamu
        const bannerMobileContainer = document.querySelector('.block.md\\:hidden.relative') || document.querySelector('.slide-hp')?.parentElement;
        
        if (bannerMobileContainer) {
            let touchStartX = 0;
            let touchEndX = 0;
            
            // Jarak minimum usapan jari (pixel) agar dianggap sebagai perintah geser
            const minSwipeDistance = 50; 

            // Tangkap koordinat saat jari pertama kali menyentuh layar
            bannerMobileContainer.addEventListener('touchstart', function(e) {
                touchStartX = e.changedTouches[0].screenX;
            }, { passive: true });

            // Tangkap koordinat saat jari dilepas dari layar
            bannerMobileContainer.addEventListener('touchend', function(e) {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipeGesture();
            }, { passive: true });

            // Logika menentukan arah swipe
            function handleSwipeGesture() {
                const distanceX = touchEndX - touchStartX;
                
                // Jika di-swipe ke KIRI (User menggeser layar ke kiri untuk melihat slide kanan)
                if (distanceX < -minSwipeDistance) {
                    changeSlideHp(1);
                } 
                // Jika di-swipe ke KANAN (User menggeser layar ke kanan untuk melihat slide kiri)
                else if (distanceX > minSwipeDistance) {
                    changeSlideHp(-1);
                }
            }
        }
    });

    // 2. SISTEM SLIDER DESKTOP (Terpisah Mandiri)
    let currentDesktopIndex = 0;
    const slidesDesktop = document.querySelectorAll('.slide-desktop');

    function showSlideDesktop(index) {
        if (slidesDesktop.length === 0) return;
        slidesDesktop.forEach(slide => slide.classList.remove('active'));
        
        currentDesktopIndex = index;
        if (currentDesktopIndex >= slidesDesktop.length) currentDesktopIndex = 0;
        if (currentDesktopIndex < 0) currentDesktopIndex = slidesDesktop.length - 1;
        
        slidesDesktop[currentDesktopIndex].classList.add('active');
    }

    function changeSlideDesktop(direction) {
        showSlideDesktop(currentDesktopIndex + direction);
    }

    // 3. CONTROL RUN BANNER AUTOMATION (Khusus Desktop Saja, Mobile di-scroll manual oleh user)
    let bannerInterval;

    window.startBannerInterval = function() {
        if (bannerInterval) clearInterval(bannerInterval); 
        
        bannerInterval = setInterval(() => {
            // Cukup jalankan fungsi desktop saja di sini agar auto-play tidak mengganggu swipe di HP
            if (typeof changeSlideDesktop === 'function') {
                changeSlideDesktop(1);
            }
        }, 5000);
    }

    window.stopBannerInterval = function() {
        if (bannerInterval) {
            clearInterval(bannerInterval);
        }
    }

    // Jalankan auto-play banner pertama kali saat website dimuat
    window.startBannerInterval();

    // 🛠️ LOGIKA PENGAMAN SCROLL SIDEBAR MOBILE agar ANTI-GLITCH
    function scrollToSection(targetId) {
        window.stopBannerInterval();

        const targetElement = document.getElementById(targetId);
        if (targetElement) {
            targetElement.scrollIntoView({ behavior: 'smooth' });
        }

        setTimeout(() => {
            window.startBannerInterval();
        }, 1200);
    }

    // 4. LOGIKA UTILITY: SCROLL PRODUCT & BACK TO TOP
    document.addEventListener("DOMContentLoaded", function () {
        lucide.createIcons();

        // Product Horizontal Scroll
        const slider = document.getElementById("productSlider");
        const btnLeft = document.getElementById("slideLeft");
        const btnRight = document.getElementById("slideRight");
        if(slider && btnLeft && btnRight) {
            const scrollAmount = 320; 
            btnRight.addEventListener("click", () => slider.scrollLeft += scrollAmount);
            btnLeft.addEventListener("click", () => slider.scrollLeft -= scrollAmount);
        }

        // Back to top button visibility & interaction
        const backToTopBtn = document.getElementById('backToTop');
        if (backToTopBtn) {
            window.addEventListener('scroll', () => {
                if (window.scrollY > 400) { 
                    backToTopBtn.classList.remove('opacity-0', 'invisible', 'translate-y-10');
                    backToTopBtn.classList.add('opacity-100', 'visible', 'translate-y-0');
                } else {
                    backToTopBtn.classList.remove('opacity-100', 'visible', 'translate-y-0');
                    backToTopBtn.classList.add('opacity-0', 'invisible', 'translate-y-10');
                }
            });

            backToTopBtn.addEventListener('click', () => {
                stopBannerInterval();
                window.scrollTo({ top: 0, behavior: 'smooth' });
                setTimeout(() => {
                    startBannerInterval();
                }, 1200);
            });
        }
    });
</script>

<button id="backToTop" class="fixed bottom-8 right-8 z-50 bg-[#fbbf24] text-black w-12 h-12 rounded-full shadow-2xl flex items-center justify-center opacity-0 invisible transition-all duration-300 hover:scale-110 hover:bg-white focus:outline-none">
    <i data-lucide="chevron-up" class="w-6 h-6"></i>
</button>

@endsection