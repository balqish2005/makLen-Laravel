@php use Illuminate\Support\Str; @endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Mak Len</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Yellowtail&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            background-color: #0f0f0f;
            color: #e5e7eb;
            font-family: 'Inter', sans-serif;
        }

        .gold { color: #fbbf24; }
        .bg-gold { background-color: #fbbf24; }

        .card {
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col">

    <header class="bg-[#0f0f0f] border-b border-gray-800 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                
                <div class="flex items-center gap-3">
                    <div class="bg-gold text-black w-8 h-8 rounded-lg flex items-center justify-center font-bold text-sm">
                        ML
                    </div>
                    <div>
                        <span class="text-2xl block leading-none" style="font-family: 'Yellowtail', cursive; color: #fbbf24;">MakLen</span>
                        <span class="text-[9px] text-gray-500 block tracking-[1.5px] mt-1 font-bold">MANAGEMENT SUITE</span>
                    </div>
                </div>

                <div class="flex-1 max-w-xs mx-8 hidden sm:block relative">
                    <div class="relative">
                        <input type="text" 
                               id="search-desktop"
                               value="{{ request('search') }}" 
                               placeholder="Cari produk..." 
                               autocomplete="off"
                               class="search-input bg-[#1a1a1a] border border-gray-700 rounded-lg pl-4 pr-10 py-1.5 text-sm text-white focus:outline-none focus:border-gold w-full transition duration-200">
                        <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400">
                            <i data-lucide="search" class="w-4 h-4 text-[#fbbf24]"></i>
                        </span>
                    </div>
                    
                    <div id="search-suggestions-desktop" class="absolute left-0 right-0 mt-2 bg-[#0a0a0a] border border-white/10 rounded-xl shadow-2xl z-50 overflow-hidden hidden max-h-60 overflow-y-auto"></div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="text-right hidden md:block">
                        <p class="text-xs font-medium text-gray-200">Admin Store</p>
                        <p class="text-[10px] text-gray-400">Owner</p>
                    </div>

                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="flex items-center gap-2 bg-red-500/10 text-red-400 hover:bg-red-500 hover:text-white px-3 py-1.5 rounded-md text-xs font-medium transition duration-300 border border-red-500/20"
                       title="Keluar Aplikasi">
                        <i data-lucide="log-out" class="w-3.5 h-3.5"></i>
                        <span>Logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>

            </div>
        </div>
    </header>

    <div class="p-4 bg-[#111111] border-b border-gray-800 sm:hidden relative z-40">
        <div class="relative">
            <input type="text" 
                   id="search-mobile"
                   value="{{ request('search') }}"
                   placeholder="Cari produk..." 
                   autocomplete="off"
                   class="search-input bg-[#1a1a1a] border border-gray-700 rounded-lg pl-4 pr-10 py-2 text-sm text-white focus:outline-none focus:border-gold w-full">
            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400">
                <i data-lucide="search" class="w-4 h-4 text-[#fbbf24]"></i>
            </span>
        </div>
        
        <div id="search-suggestions-mobile" class="absolute left-4 right-4 mt-1 bg-[#0a0a0a] border border-white/10 rounded-xl shadow-2xl z-50 overflow-hidden hidden max-h-60 overflow-y-auto"></div>
    </div>

    <div class="max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <div id="recent-search-box" class="hidden flex-wrap items-center gap-2 bg-[#141414] border border-white/5 p-3 rounded-xl">
            <span class="text-xs text-gray-500 font-medium mr-1 mobile-hide">Pencarian Terakhir:</span>
            <div id="recent-list" class="flex flex-wrap gap-1.5"></div>
        </div>
    </div>

    <main class="flex-1 max-w-7xl w-full mx-auto p-4 sm:p-6 lg:p-8">
        @yield('content')
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }

            const searchInputs = document.querySelectorAll('.search-input');
            
            let suggestionTimer; 
            let selectedIndex = -1;
            let suggestions = [];

            // ==========================================
            // RECENT SEARCH LOGIC
            // ==========================================
            function saveRecent(keyword) {
                if (!keyword || keyword.trim() === '') return;
                let data = JSON.parse(localStorage.getItem('admin_recent_search') || '[]');
                data = data.filter(i => i !== keyword.trim());
                data.unshift(keyword.trim());
                data = data.slice(0, 5);
                localStorage.setItem('admin_recent_search', JSON.stringify(data));
            }

            function renderRecent() {
                const wrapper = document.getElementById('recent-search-box');
                const listContainer = document.getElementById('recent-list');
                if (!wrapper || !listContainer) return;

                let data = JSON.parse(localStorage.getItem('admin_recent_search') || '[]');
                if (!data.length) {
                    wrapper.classList.add('hidden');
                    return;
                }

                wrapper.classList.remove('hidden');
                listContainer.innerHTML = data.map(item => `
                    <span class="recent-item cursor-pointer px-2 py-0.5 sm:px-2.5 sm:py-1 bg-[#1a1a1a] border border-gray-800 rounded-md text-[11px] sm:text-xs text-gray-300 hover:bg-[#fbbf24] hover:text-black transition duration-200">
                        ${item}
                    </span>
                `).join('');

                listContainer.querySelectorAll('.recent-item').forEach(el => {
                    el.addEventListener('click', function () {
                        executeSearch(this.innerText);
                    });
                });
            }

            renderRecent();

            // ==========================================
            // EXECUTE PAGE RELOAD
            // ==========================================
            function executeSearch(keyword) {
                const url = new URL(window.location.href);
                const cleanKeyword = keyword.trim();

                if (cleanKeyword !== "") {
                    saveRecent(cleanKeyword);
                    url.searchParams.set('search', cleanKeyword);
                    url.searchParams.delete('category'); 
                } else {
                    url.searchParams.delete('search');
                }
                
                url.searchParams.delete('page'); 
                window.location.href = url.toString();
            }

            // ==========================================
            // AJAX DROPDOWN SUGGESTIONS (FIXED)
            // ==========================================
            function fetchSuggestions(keyword, currentSuggestionBox) {
                if (!currentSuggestionBox) return;
                if (!keyword || keyword.length < 1) {
                    currentSuggestionBox.classList.add('hidden');
                    return;
                }

                clearTimeout(suggestionTimer);
                suggestionTimer = setTimeout(() => {
                    fetch(`/search-suggestions?search=${encodeURIComponent(keyword)}`)
                        .then(res => res.json())
                        .then(data => {
                            suggestions = data;
                            selectedIndex = -1;

                            // JIKA MENU TIDAK DITEMUKAN
                            if (!data.length) {
                                currentSuggestionBox.innerHTML = `
                                    <div class="px-4 py-3 text-xs sm:text-sm text-gray-400 text-center italic">
                                        menu tidak ada dalam daftar
                                    </div>
                                `;
                                currentSuggestionBox.classList.remove('hidden');
                                return;
                            }

                            // JIKA MENU ADA
                            currentSuggestionBox.innerHTML = data.map((item, index) => {
                                const regex = new RegExp(`(${keyword})`, 'gi');
                                const highlighted = item.name.replace(regex, `<span class="text-[#fbbf24] font-bold">$1</span>`);

                                return `
                                <div class="suggestion-item px-3 py-2 sm:px-4 sm:py-2.5 hover:bg-[#1a1a1a] cursor-pointer border-b border-white/5 transition"
                                    data-index="${index}"
                                    data-name="${item.name}">
                                    <div class="text-xs sm:text-sm text-white font-medium">${highlighted}</div>
                                    <div class="text-[9px] sm:text-[10px] text-gray-500 uppercase mt-0.5">${item.category?.name || 'Menu'}</div>
                                </div>`;
                            }).join('');

                            currentSuggestionBox.classList.remove('hidden');
                        })
                        .catch(err => console.log("Suggestion error"));
                }, 250); 
            }

            // ==========================================
            // TRIGGER LISTENERS
            // ==========================================
            searchInputs.forEach(input => {
                const container = input.closest('.relative');
                const currentSuggestionBox = container ? container.nextElementSibling || container.querySelector('[id^="search-suggestions"]') : null;

                input.addEventListener('input', function () {
                    const keyword = this.value.trim();
                    
                    if (keyword === "") {
                        if (currentSuggestionBox) currentSuggestionBox.classList.add('hidden');
                        executeSearch(""); 
                        return;
                    }
                    
                    const activeSuggestionBox = window.innerWidth < 640 
                        ? document.getElementById('search-suggestions-mobile') 
                        : document.getElementById('search-suggestions-desktop');

                    fetchSuggestions(keyword, activeSuggestionBox);
                });

                input.addEventListener('keydown', function (e) {
                    const activeSuggestionBox = window.innerWidth < 640 
                        ? document.getElementById('search-suggestions-mobile') 
                        : document.getElementById('search-suggestions-desktop');

                    if (!activeSuggestionBox || activeSuggestionBox.classList.contains('hidden')) return;
                    const items = activeSuggestionBox.querySelectorAll('.suggestion-item');

                    // Cegah navigasi keyboard jika items kosong (saat tulisan 'tidak ada' muncul)
                    if (items.length === 0) return;

                    if (e.key === 'ArrowDown') {
                        e.preventDefault();
                        selectedIndex = Math.min(selectedIndex + 1, items.length - 1);
                    }
                    if (e.key === 'ArrowUp') {
                        e.preventDefault();
                        selectedIndex = Math.max(selectedIndex - 1, 0);
                    }
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        if (selectedIndex >= 0 && items[selectedIndex]) {
                            executeSearch(items[selectedIndex].dataset.name);
                        } else {
                            executeSearch(this.value);
                        }
                        return;
                    }

                    items.forEach((el, i) => {
                        el.classList.toggle('bg-[#1a1a1a]', i === selectedIndex);
                    });
                });
            });

            // Menutup box sugesti saat klik di luar area
            document.addEventListener('click', function (e) {
                const activeSuggestionBox = window.innerWidth < 640 
                    ? document.getElementById('search-suggestions-mobile') 
                    : document.getElementById('search-suggestions-desktop');

                if (!activeSuggestionBox) return;

                const isClickInsideInput = e.target.closest('.search-input');
                const isClickInsideBox = e.target.closest('[id^="search-suggestions"]');

                const item = e.target.closest('.suggestion-item');
                if (item) {
                    executeSearch(item.dataset.name); 
                }

                if (!isClickInsideInput && !isClickInsideBox) {
                    document.getElementById('search-suggestions-desktop').classList.add('hidden');
                    document.getElementById('search-suggestions-mobile').classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>