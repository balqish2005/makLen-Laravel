@extends('frontend.layouts.app')

@section('content')
<style>
    body {
        background-color: #0f0f0f;
        color: white;
        font-family: 'Inter', sans-serif;
    }

    .gold-text { color: #fbbf24; }
    .bg-gold { background-color: #fbbf24; }
    
    .glass-card {
        background: rgba(26, 26, 26, 0.6);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(251, 191, 36, 0.1);
    }

    .benefit-card {
        background: #1a1a1a;
        border-left: 4px solid #fbbf24;
        transition: 0.3s;
    }

    .benefit-card:hover {
        transform: translateY(-5px);
        background: #222;
    }

    .cursive {
        font-family: 'Yellowtail', cursive;
    }
</style>

<!-- ==================== BANNER ABOUT ==================== -->
<!-- Di mobile tingginya diatur proporsional landscape (h-[240px] atau h-[280px]), di desktop kembali megah (md:h-[70vh] atau md:h-[95vh]) -->
<section class="relative w-full h-[250px] md:h-[70vh] overflow-hidden">
    <img src="{{ asset('images/banner_about2.png') }}" class="w-full h-full object-cover" alt="Banner Bakery">

    <div class="absolute inset-0 bg-black/55"></div>

    <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-6 z-10">
        <!-- Ukuran teks disesuaikan: text-3xl di mobile agar pas dengan tinggi landscape yang ringkas, md:text-7xl di desktop -->
        <h1 class="text-3xl md:text-6xl font-bold mb-2 md:mb-4 text-white">
            About <span class="gold-text cursive">Us</span>
        </h1>
        <!-- max-w-sm di mobile agar teks deskripsi tidak melebar mentok ke tepi layar landscape HP -->
        <p class="text-gray-200 text-xs md:text-base max-w-sm md:max-w-2xl leading-relaxed">
            Dedikasi kami adalah menghadirkan kelezatan autentik melalui 
            bahan-bahan premium pilihan dan resep warisan yang terus kami jaga kualitasnya.
        </p>
    </div>
</section>

<!-- ==================== SECTION ABOUT 1 ==================== -->
<section class="px-4 sm:px-8 md:px-16 py-8 md:py-20">
    <div class="max-w-7xl mx-auto grid grid-cols-2 gap-4 sm:gap-8 md:gap-16 items-center">
        
        <div class="relative">
            <img src="{{ asset('images/baker2.webp') }}"
                 class="w-full aspect-[3/4] sm:aspect-square md:h-[500px] md:w-full object-cover rounded-xl md:rounded-3xl shadow-xl md:shadow-2xl border border-[#fbbf24]/10"
                 alt="Baker">
            <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-[#fbbf24]/10 blur-3xl rounded-full hidden md:block"></div>
        </div>

        <div class="flex flex-col justify-center">
            <h2 class="text-lg sm:text-2xl md:text-4xl font-bold mb-3 md:mb-6 leading-tight text-white">
                Home Sweet <span class="gold-text">Bakery</span>
            </h2>

            <p class="text-gray-300 text-sm md:text-base mb-5 md:mb-8 leading-relaxed hidden md:block">
                Berawal dari dapur rumah tangga yang penuh cinta, Mak Len Cake & Cookies tumbuh menjadi destinasi utama pecinta kue di Jombang. Kami percaya bahwa kualitas tidak pernah mengkhianati rasa.
            </p>

            <div class="space-y-2 md:space-y-4 mb-4 md:mb-8 md:bg-white/[0.02] md:p-4 rounded-lg md:rounded-xl md:border md:border-white/[0.05]">
                <div class="flex items-center gap-1.5">
                    <div class="w-1 h-1 rounded-full bg-[#fbbf24]"></div>
                    <span class="font-bold text-[9px] sm:text-xs tracking-widest uppercase text-[#fbbf24]">
                        Jam Buka :
                    </span>
                </div>

                <div class="block md:hidden text-[10px] text-gray-300 space-y-1 leading-normal">
                    <div>
                        <span class="font-medium text-white">Setiap hari 08.00 - 17.00</span>
                    </div>
                    <div class="text-gray-400 text-[9px]">
                        Jika ada pesanan khusus <span class="italic">akan kami infokan</span>
                    </div>
                </div>

                <div class="hidden md:grid grid-cols-2 text-sm text-gray-300 gap-y-2 gap-x-4 max-w-md">
                    <div class="font-medium">Senin - Minggu</div>
                    <div class="text-right font-semibold text-white">08.00 - 17.00</div>

                    <div class="text-gray-400">Jika ada pesanan khusus</div>
                    <div class="text-right text-gray-400 italic">akan kami infokan</div>
                </div>
            </div> <div class="flex gap-2 sm:gap-4">
                <a href="https://www.instagram.com/thomaajeng/"
                   target="_blank"
                   class="w-8 h-8 sm:w-11 sm:h-11 md:w-10 md:h-10 rounded-full border border-[#fbbf24]/30 flex items-center justify-center text-[#fbbf24] hover:bg-[#fbbf24] hover:text-black transition duration-300"
                   aria-label="Instagram Mak Len">
                    <i class="fa-brands fa-instagram text-xs sm:text-base md:text-sm"></i>
                </a>

                <a href="https://wa.me/6282232321112?text=Halo%20MakLen,%20saya%20ingin%20pesan%20cake"
                   target="_blank"
                   class="w-8 h-8 sm:w-11 sm:h-11 md:w-10 md:h-10 rounded-full border border-[#fbbf24]/30 flex items-center justify-center text-[#fbbf24] hover:bg-[#fbbf24] hover:text-black transition duration-300"
                   aria-label="Whatsapp Mak Len">
                    <i class="fa-brands fa-whatsapp text-xs sm:text-base md:text-sm"></i>
                </a>
            </div>
        </div>

    </div>
</section> 

<!-- ==================== SECTION ABOUT 2 ==================== -->
<section class="px-4 sm:px-8 md:px-16 py-8 md:py-20">
    <div class="max-w-7xl mx-auto">

        <div class="block md:hidden grid grid-cols-2 gap-4 items-center">
            <div class="flex flex-col justify-center">
                <h2 class="text-lg sm:text-2xl font-bold mb-3 leading-tight text-white">
                    Freshly Baked Bread <br><span class="gold-text">Every Morning</span>
                </h2>
                
                <div class="mt-1">
                    <a href="{{ route('home') }}#products" class="inline-block bg-gold text-black text-xs px-5 py-2 rounded-lg font-bold hover:scale-105 transition shadow-lg">
                        Visit Us
                    </a>
                </div>
            </div>
            
            <div class="relative">
                <img src="{{ asset('images/banner1.jpeg') }}" class="w-full aspect-[4/3] object-cover rounded-xl border border-gold/10" alt="Bread">
            </div>
        </div>


        <div class="hidden md:grid grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-4xl font-bold mb-6 leading-tight">Freshly Baked Bread <br><span class="gold-text">Every Morning</span></h2>
                <p class="text-gray-400 mb-8 leading-relaxed">
                    Setiap hari sebelum matahari terbit, oven kami sudah mulai bekerja. Kami memastikan setiap roti yang sampai ke tangan Anda adalah hasil panggangan hari ini. Tanpa pengawet, hanya bahan alami.
                </p>
                <a href="{{ route('home') }}#products" class="inline-block bg-gold text-black px-8 py-3 rounded-xl font-bold hover:scale-105 transition shadow-lg shadow-yellow-500/10">
                    Visit Us
                </a>
            </div>
            <div class="relative">
                <img src="{{ asset('images/banner1.jpeg') }}" class="rounded-3xl shadow-2xl border-2 border-gold/10" alt="Bread">
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-gold/20 blur-3xl rounded-full"></div>
            </div>
        </div>

    </div>
</section>

<!-- ==================== SECTION ABOUT 3 ==================== -->
<section class="relative">

    <div class="block md:hidden bg-black py-12 px-4">
        <div class="max-w-md mx-auto bg-white rounded-xl shadow-2xl overflow-hidden grid grid-cols-12">
            
            <div class="col-span-5 relative h-full min-h-[180px]">
                <img src="{{ asset('images/roti_kacang_merah.jpg') }}" 
                     class="w-full h-full object-cover" 
                     alt="Perfect Pancakes">
            </div>

            <div class="col-span-7 flex flex-col justify-between bg-white">
                <div class="p-4 pb-2">
                    <h3 class="text-gray-900 font-serif font-bold text-base leading-tight">Perfect Pancakes</h3>
                    <p class="text-[9px] font-semibold text-yellow-600 tracking-wider uppercase mt-0.5">Season Favorite</p>
                    
                    <p class="text-[10px] text-gray-500 leading-relaxed mt-2 line-clamp-3">
                        Varian menu spesial dengan tekstur lembut berpadu toping buah segar, menghadirkan kelezatan autentik di setiap gigitannya.
                    </p>
                    
                    <div class="flex items-center gap-0.5 mt-3 text-red-500 text-[10px]">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>

                <div class="bg-gray-50 p-2.5 flex justify-center gap-3 border-t border-gray-100">
                    <img src="{{ asset('images/thumb1.jpg') }}" class="w-7 h-7 rounded-full object-cover border border-white shadow-sm" alt="thumb">
                    <img src="{{ asset('images/thumb2.jpg') }}" class="w-7 h-7 rounded-full object-cover border border-white shadow-sm" alt="thumb">
                    <img src="{{ asset('images/thumb3.jpg') }}" class="w-7 h-7 rounded-full object-cover border border-white shadow-sm" alt="thumb">
                </div>
            </div>

        </div>
    </div>


    <div class="hidden md:block px-6 md:px-16 py-24">
        <div class="max-w-7xl mx-auto text-center mb-16">
            <h2 class="text-4xl font-bold mb-4">Benefits Of <span class="gold-text">Our Breads</span></h2>
            <div class="w-24 h-1 bg-gold mx-auto rounded-full"></div>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
            <div class="space-y-6 text-right">
                <div class="benefit-card p-6 rounded-2xl">
                    <h4 class="font-bold mb-2">There's so much choice</h4>
                    <p class="text-gray-500 text-sm">Varian rasa yang beragam mulai dari manis hingga gurih.</p>
                </div>
                <div class="benefit-card p-6 rounded-2xl">
                    <h4 class="font-bold mb-2">It tastes great</h4>
                    <p class="text-gray-500 text-sm">Resep rahasia yang menjamin rasa autentik di tiap gigitan.</p>
                </div>
                <div class="benefit-card p-6 rounded-2xl">
                    <h4 class="font-bold mb-2">Prebiotic properties</h4>
                    <p class="text-gray-500 text-sm">Menggunakan ragi pilihan yang lebih bersahabat untuk pencernaan.</p>
                </div>
            </div>

            <div class="flex justify-center py-10 md:py-0">
                <div class="relative group">
                    <div class="absolute inset-0 bg-gold/10 blur-3xl rounded-full scale-125 group-hover:bg-gold/20 transition"></div>
                    <img src="{{ asset('images/roti_kacang_merah.jpg') }}" class="w-64 h-64 md:w-80 md:h-80 object-cover rounded-full border-4 border-gold relative z-10" alt="Specialty Bread">
                </div>
            </div>

            <div class="space-y-6">
                <div class="benefit-card p-6 rounded-2xl border-l-0 border-r-4">
                    <h4 class="font-bold mb-2">Fuel for longer</h4>
                    <p class="text-gray-500 text-sm">Karbohidrat kompleks yang memberikan energi tahan lama.</p>
                </div>
                <div class="benefit-card p-6 rounded-2xl border-l-0 border-r-4">
                    <h4 class="font-bold mb-2">High Quality Ingredients</h4>
                    <p class="text-gray-500 text-sm">Hanya menggunakan tepung dan mentega grade premium.</p>
                </div>
                <div class="benefit-card p-6 rounded-2xl border-l-0 border-r-4">
                    <h4 class="font-bold mb-2">Cost effective</h4>
                    <p class="text-gray-500 text-sm">Kualitas premium dengan harga yang tetap terjangkau.</p>
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
        lucide.createIcons();

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
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
    });
</script>

<button id="backToTop" 
    class="fixed bottom-8 right-8 z-50 bg-[#fbbf24] text-black w-12 h-12 rounded-full shadow-2xl flex items-center justify-center opacity-0 invisible transition-all duration-300 hover:scale-110 hover:bg-white focus:outline-none">
    <i data-lucide="chevron-up" class="w-6 h-6"></i>
</button>
@endsection