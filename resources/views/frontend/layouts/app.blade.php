<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>makLen cake & cookies</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@400;700&family=Yellowtail&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
    html {
        scroll-behavior: smooth !important;
    }
    body {
        -webkit-overflow-scrolling: touch;
    }
    </style>
</head>

<body class="bg-black text-white">

    <nav class="absolute top-0 left-0 w-full z-50 bg-transparent">

        <div class="hidden md:flex max-w-7xl mx-auto px-6 py-10 justify-between items-center">
            <h1 class="flex items-baseline gap-2 leading-none">
                <span style="font-family: 'Yellowtail', cursive; color: #fbbf24;" class="text-2xl md:text-3xl normal-case">makLen</span>
                <span style="font-family: 'Montserrat', sans-serif; color: #fbbf24;" class="text-[9px] md:text-[10px] font-semibold tracking-[0.25em] uppercase">cake & cookies</span>
            </h1>
            <div class="flex gap-8 text-white uppercase tracking-[0.2em] text-[11px]" style="font-family: 'Poppins', sans-serif;">
                <a href="javascript:void(0);" onclick="smartScroll('home')" class="hover:text-[#fbbf24] transition-colors duration-300">Home</a>
                <a href="javascript:void(0);" onclick="smartScroll('about')" class="hover:text-[#fbbf24] transition-colors duration-300">About</a>
                <a href="javascript:void(0);" onclick="smartScroll('products')" class="hover:text-[#fbbf24] transition-colors duration-300">Products</a>
                <a href="javascript:void(0);" onclick="smartScroll('contact')" class="hover:text-[#fbbf24] transition-colors duration-300">Contact</a>
            </div>
        </div>

        <div class="flex md:hidden w-full px-4 py-4 justify-between items-center relative">
    
            <h1 class="flex items-baseline gap-1.5 leading-none">
                <span style="font-family: 'Yellowtail', cursive; color: #fbbf24;" class="text-xl normal-case">makLen</span>
                <span style="font-family: 'Montserrat', sans-serif; color: #fbbf24;" class="text-[7px] font-semibold tracking-[0.2em] uppercase">cake & cookies</span>
            </h1>

            <button onclick="toggleMobileMenu(event)" class="group relative w-6 h-5 flex flex-col justify-between items-center focus:outline-none z-50 mt-1" id="menuButton">
                <span class="w-6 h-[2px] bg-[#fbbf24] rounded transition-all duration-300 transform origin-top-left" id="line1"></span>
                <span class="w-6 h-[2px] bg-[#fbbf24] rounded transition-all duration-300" id="line2"></span>
                <span class="w-6 h-[2px] bg-[#fbbf24] rounded transition-all duration-300 transform origin-bottom-left" id="line3"></span>
            </button>

            <div id="mobileDropdown" 
                class="absolute top-14 right-4 bg-gradient-to-b from-[#161616] to-[#0a0a0a] border border-[#fbbf24]/40 rounded-xl p-4 w-44 shadow-[0_10px_25px_rgba(251,191,36,0.15)] transition-all duration-300 opacity-0 -translate-y-2 pointer-events-none transform origin-top-right backdrop-blur-md">
                
                <div class="flex flex-col gap-1 text-[#fbbf24] uppercase tracking-[0.15em] text-[10px] font-semibold" style="font-family: 'Poppins', sans-serif;">
                    <a href="javascript:void(0);" onclick="smartScroll('home', true)" class="flex items-center px-2.5 py-2 rounded-lg hover:bg-[#fbbf24]/10 hover:text-yellow-300 transition-all duration-200">
                        Home
                    </a>
                    <a href="javascript:void(0);" onclick="smartScroll('about', true)" class="flex items-center px-2.5 py-2 rounded-lg hover:bg-[#fbbf24]/10 hover:text-yellow-300 transition-all duration-200">
                        About
                    </a>
                    <a href="javascript:void(0);" onclick="smartScroll('products', true)" class="flex items-center px-2.5 py-2 rounded-lg hover:bg-[#fbbf24]/10 hover:text-yellow-300 transition-all duration-200">
                        Products
                    </a>
                    <a href="javascript:void(0);" onclick="smartScroll('contact', true)" class="flex items-center px-2.5 py-2 rounded-lg hover:bg-[#fbbf24]/10 hover:text-yellow-300 transition-all duration-200">
                        Contact
                    </a>
                </div>
                
                <div class="w-full h-[1px] bg-gradient-to-r from-transparent via-[#fbbf24]/30 to-transparent mt-2"></div>
            </div>

        </div>

    </nav>

    @yield('content')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }

            // Jika user baru datang dari halaman lain membawa hash (contoh: /#about)
            if (window.location.hash) {
                const hash = window.location.hash.substring(1);
                // Beri jeda 300ms agar halaman selesai load sempurna baru lakukan smooth scroll mendatar
                setTimeout(() => {
                    executeSmoothScroll(hash);
                }, 300);
            }
        });

        // FUNGSI INTI: Memeriksa posisi halaman aktif saat menu diklik
        function smartScroll(targetId, isMobile = false) {
            if (isMobile) {
                toggleMobileMenu(); // Tutup menu dropdown mobile terlebih dahulu
            }

            // Cek apakah user sedang berada di root/halaman utama atau bukan
            const isHomePage = window.location.pathname === '/' || window.location.pathname === '/index.php' || window.location.pathname.endsWith('/home') || window.location.href === "{{ route('home') }}";

            if (isHomePage) {
                // Jika sudah ada di home, langsung luncurkan smooth scroll bawaan tanpa reload
                executeSmoothScroll(targetId);
            } else {
                // Jika sedang di halaman /about, buat link redirect kembali ke home membawa anchor hash id
                window.location.href = "{{ route('home') }}#" + targetId;
            }
        }

        // FUNGSI EKSEKUSI ANIMASI SMOOTH SCROLL DENGAN OFFSET NAVBAR
        function executeSmoothScroll(targetId) {
            if (targetId === 'home') {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            } else {
                const targetElement = document.getElementById(targetId);
                if (targetElement) {
                    const offset = 20; // Jarak aman atas agar judul tidak menempel mepet navbar
                    const elementPosition = targetElement.getBoundingClientRect().top + window.scrollY;
                    window.scrollTo({
                        top: elementPosition - offset,
                        behavior: 'smooth'
                    });
                }
            }
        }

        function toggleMobileMenu(event) {
            if (event) {
                event.stopPropagation();
            }

            const dropdown = document.getElementById('mobileDropdown');
            const line1 = document.getElementById('line1');
            const line2 = document.getElementById('line2');
            const line3 = document.getElementById('line3');
            
            const isHidden = dropdown.classList.contains('opacity-0');

            if (isHidden) {
                dropdown.classList.remove('opacity-0', '-translate-y-2', 'pointer-events-none');
                dropdown.classList.add('opacity-100', 'translate-y-0');
                
                line1.classList.add('rotate-45', 'translate-x-[4px]', '-translate-y-[2px]');
                line2.classList.add('opacity-0', 'scale-0');
                line3.classList.add('-rotate-45', 'translate-x-[4px]', 'translate-y-[2px]');
            } else {
                dropdown.classList.remove('opacity-100', 'translate-y-0');
                dropdown.classList.add('opacity-0', '-translate-y-2', 'pointer-events-none');
                
                line1.classList.remove('rotate-45', 'translate-x-[4px]', '-translate-y-[2px]');
                line2.classList.remove('opacity-0', 'scale-0');
                line3.classList.remove('-rotate-45', 'translate-x-[4px]', 'translate-y-[2px]');
            }
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function (event) {
            const dropdown = document.getElementById('mobileDropdown');
            const menuButton = document.getElementById('menuButton');

            if (dropdown && !dropdown.classList.contains('opacity-0') && 
                !dropdown.contains(event.target) && 
                !menuButton.contains(event.target)) {
                
                toggleMobileMenu();
            }
        });
    </script>
</body>
</html>