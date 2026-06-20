@php use Illuminate\Support\Str; @endphp

@extends('backend.layouts.app')

@section('content')

<div class="mb-8 space-y-6">
    <div>
        <h2 class="text-xs font-bold uppercase tracking-widest text-gray-500 mb-3 flex items-center gap-2">
            <i data-lucide="layers" class="w-3.5 h-3.5 text-[#fbbf24]"></i> Status Produk
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            
            <div class="card p-4 rounded-xl flex items-center justify-between border-l-4 border-emerald-500">
                <div>
                    <span class="text-xs text-gray-400 block font-medium">Diterbitkan (Publish)</span>
                    <span class="text-2xl font-bold text-emerald-400 mt-1 block">{{ $countPublish ?? 0 }} <span class="text-xs text-gray-500 font-normal">Menu</span></span>
                </div>
                <div class="p-2.5 bg-emerald-500/10 rounded-lg text-emerald-400">
                    <i data-lucide="globe" class="w-5 h-5"></i>
                </div>
            </div>

            <div class="card p-4 rounded-xl flex items-center justify-between border-l-4 border-[#fbbf24]">
                <div>
                    <span class="text-xs text-gray-400 block font-medium">Produk Terlaris</span>
                    <span class="text-2xl font-bold text-[#fbbf24] mt-1 block">{{ $countBestSeller ?? 0 }} <span class="text-xs text-gray-500 font-normal">Menu</span></span>
                </div>
                <div class="p-2.5 bg-[#fbbf24]/10 rounded-lg text-[#fbbf24]">
                    <i data-lucide="award" class="w-5 h-5"></i>
                </div>
            </div>

            <div class="card p-4 rounded-xl flex items-center justify-between border-l-4 border-gray-600">
                <div>
                    <span class="text-xs text-gray-400 block font-medium">Arsip (Draft)</span>
                    <span class="text-2xl font-bold text-gray-300 mt-1 block">{{ $countDraft ?? 0 }} <span class="text-xs text-gray-500 font-normal">Menu</span></span>
                </div>
                <div class="p-2.5 bg-gray-500/10 rounded-lg text-gray-400">
                    <i data-lucide="file-text" class="w-5 h-5"></i>
                </div>
            </div>

        </div>
    </div>

    <div>
        <h2 class="text-xs font-bold uppercase tracking-widest text-gray-500 mb-3 flex items-center gap-2">
            <i data-lucide="tags" class="w-3.5 h-3.5 text-[#fbbf24]"></i> Total Per Kategori
        </h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($categoryCounts as $catName => $count)
            <div class="card p-4 rounded-xl flex flex-col justify-between relative overflow-hidden group hover:border-[#fbbf24]/30 transition duration-300">
                <div class="flex justify-between items-start mb-2">
                    <span class="text-xs font-semibold text-gray-300 group-hover:text-[#fbbf24] transition duration-200 truncate pr-2">
                        {{ $catName }}
                    </span>
                    <span class="text-2xl font-extrabold text-white">
                        {{ $count }}
                    </span>
                </div>
                <span class="text-[10px] text-gray-500 uppercase tracking-wider font-medium">Total Menu</span>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
    <div>
        <h1 class="text-4xl" style="font-family: 'Yellowtail', cursive; color: #fbbf24;">MakLen</h1>
        <p class="text-gray-400 text-sm">Ada kualitas di setiap remahannya.</p>
    </div>

    <a href="{{ route('admin.products.create') }}"
        class="w-full sm:w-auto text-center bg-gold text-black px-4 py-2.5 rounded font-bold text-xs tracking-wider hover:bg-yellow-400 transition duration-300">
        + ADD NEW PRODUCT
    </a>
</div>

@if(session('success'))
    <div class="bg-green-500/10 border border-green-500/30 text-green-400 p-4 rounded-lg mb-6 text-sm flex items-center gap-2">
        <span>✅</span> {{ session('success') }}
    </div>
@endif

<div class="card rounded-lg p-3 sm:p-4 bg-[#111111] border border-gray-800">

    <div class="flex items-center gap-2 mb-6 overflow-x-auto whitespace-nowrap pb-2 scrollbar-hide">
        <a href="{{ route('admin.products.index', request()->only('search')) }}"
           class="px-4 py-1.5 rounded text-xs sm:text-sm font-medium transition duration-300 inline-block {{ !request('category') ? 'bg-gold text-black' : 'bg-gray-800/50 text-gray-400 hover:text-white hover:bg-gray-800' }}">
            All Items
        </a>

        @foreach($categories as $c)
            <a href="{{ route('admin.products.index', ['category' => $c->id] + request()->only('search')) }}"
               class="px-4 py-1.5 rounded text-xs sm:text-sm font-medium transition duration-300 inline-block {{ request('category') == $c->id ? 'bg-gold text-black' : 'bg-gray-800/50 text-gray-400 hover:text-white hover:bg-gray-800' }}">
               {{ $c->name }}
            </a>
        @endforeach
    </div>

    <div class="hidden sm:block overflow-x-auto">
        <table class="w-full text-sm text-left border-collapse">
            <thead class="text-gray-400 font-semibold border-b border-gray-800 bg-gray-900/30">
                <tr>
                    <th class="py-3 px-4">PRODUCT</th>
                    <th class="py-3 px-4">CATEGORY</th>
                    <th class="py-3 px-4">PRICE</th>
                    <th class="py-3 px-4">STATUS</th>
                    <th class="py-3 px-4 text-center">ACTION</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-800/60">
                @forelse($products as $p)
                <tr class="hover:bg-gray-900/20 transition duration-200">
                    <td class="py-3 px-4 flex items-center gap-3">
                        @if($p->image)
                            <img src="{{ asset('storage/'.$p->image) }}" class="w-12 h-12 rounded object-cover border border-gray-800">
                        @else
                            <div class="w-12 h-12 rounded bg-gray-800 flex items-center justify-center text-[10px] text-gray-500 border border-gray-700">No Img</div>
                        @endif
                        <div class="max-w-xs md:max-w-sm">
                            <p class="font-medium text-white truncate">{{ $p->name }}</p>
                            <p class="text-xs text-gray-400 mt-0.5 line-clamp-1">{{ $p->description ?? 'Tidak ada deskripsi.' }}</p>
                        </div>
                    </td>
                    <td class="py-3 px-4 vertical-align-middle">
                        <span class="bg-gray-800/80 text-gray-300 px-2.5 py-1 rounded text-xs border border-gray-700/50">
                            {{ $p->category->name ?? '-' }}
                        </span>
                    </td>
                    <td class="py-3 px-4 text-gray-200 font-medium">Rp {{ number_format($p->price, 0, ',', '.') }}</td>
                    <td class="py-3 px-4">
                        @if($p->status == 'publish')
                            <span class="bg-green-500/10 text-green-400 border border-green-500/20 px-2.5 py-1 rounded text-xs font-medium whitespace-nowrap">Publish</span>
                        @elseif($p->status == 'best_seller')
                            <span class="bg-amber-500/10 text-[#fbbf24] border border-amber-500/30 px-2.5 py-1 rounded text-xs font-semibold whitespace-nowrap flex items-center gap-1 w-max">Best Seller</span>
                        @else
                            <span class="bg-gray-700/50 text-gray-400 border border-gray-600/20 px-2.5 py-1 rounded text-xs font-medium whitespace-nowrap">Draft</span>
                        @endif
                    </td>
                    <td class="py-3 px-4 text-center">
                        <div class="flex items-center justify-center gap-4">
                            <a href="{{ route('admin.products.edit', $p->id) }}" class="text-gray-400 hover:text-gold transition duration-200" title="Edit Produk">
                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                            </a>
                            <button type="button" onclick="openDeleteModal('{{ $p->id }}', '{{ addslashes($p->name) }}')" class="text-gray-400 hover:text-red-400 transition duration-200 focus:outline-none" title="Hapus Produk">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </button>
                            <form id="delete-form-{{ $p->id }}" action="{{ route('admin.products.destroy', $p->id) }}" method="POST" class="hidden">
                                @csrf @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-12 text-center text-gray-500">
                        <p class="text-base font-medium">Tidak ada produk ditemukan</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="block sm:hidden space-y-3">
        @forelse($products as $p)
        <div class="p-3 bg-[#161616] border border-gray-800/80 rounded-xl flex items-start gap-3 relative">
            
            @if($p->image)
                <img src="{{ asset('storage/'.$p->image) }}" class="w-14 h-14 rounded-lg object-cover border border-gray-800 shrink-0">
            @else
                <div class="w-14 h-14 rounded-lg bg-gray-800 flex items-center justify-center text-[9px] text-gray-500 border border-gray-700 shrink-0">No Img</div>
            @endif

            <div class="flex-1 min-w-0 pr-16">
                <p class="font-semibold text-sm text-white truncate">{{ $p->name }}</p>
                <p class="text-xs text-gray-400 font-medium mt-0.5">Rp {{ number_format($p->price, 0, ',', '.') }}</p>
                
                <div class="flex flex-wrap items-center gap-1.5 mt-2">
                    <span class="bg-gray-800 text-gray-400 px-2 py-0.5 rounded text-[10px] border border-gray-700/30">
                        {{ $p->category->name ?? '-' }}
                    </span>
                    @if($p->status == 'publish')
                        <span class="bg-green-500/10 text-green-400 px-2 py-0.5 rounded text-[10px] font-medium border border-green-500/10">Publish</span>
                    @elseif($p->status == 'best_seller')
                        <span class="bg-amber-500/10 text-[#fbbf24] px-2 py-0.5 rounded text-[10px] font-semibold border border-amber-500/10">Best Seller</span>
                    @else
                        <span class="bg-gray-700/50 text-gray-400 px-2 py-0.5 rounded text-[10px] font-medium">Draft</span>
                    @endif
                </div>
            </div>

            <div class="absolute top-3 right-3 flex items-center gap-3 bg-[#111111] p-1.5 rounded-lg border border-gray-800 shadow-md">
                <a href="{{ route('admin.products.edit', $p->id) }}" class="text-gray-400 hover:text-gold transition p-0.5">
                    <i data-lucide="edit-3" class="w-3.5 h-3.5"></i>
                </a>
                <button type="button" onclick="openDeleteModal('{{ $p->id }}', '{{ addslashes($p->name) }}')" class="text-gray-400 hover:text-red-400 transition p-0.5 focus:outline-none">
                    <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                </button>
            </div>

        </div>
        @empty
        <div class="py-8 text-center text-gray-500 card rounded-xl">
            <p class="text-sm font-medium">Tidak ada produk ditemukan</p>
        </div>
        @endforelse
    </div>

    @if($products->hasPages())
        <div id="pagination-container" class="mt-6 pt-4 border-t border-gray-800 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-xs text-gray-500 uppercase tracking-wider text-center sm:text-left">
                Showing <span class="text-gray-300 font-semibold">{{ $products->firstItem() }}</span> - <span class="text-gray-300 font-semibold">{{ $products->lastItem() }}</span> of <span class="text-[#fbbf24] font-bold">{{ $products->total() }}</span> Products
            </p>
            
            <div class="flex items-center gap-1 bg-[#0d0d0d] border border-gray-800 p-1 rounded-xl">
                @if($products->onFirstPage())
                    <span class="w-9 h-9 flex items-center justify-center rounded-lg text-gray-700 cursor-not-allowed">
                        <i data-lucide="chevron-left" class="w-4 h-4"></i>
                    </span>
                @else
                    <a href="{{ $products->appends(request()->query())->previousPageUrl() }}" class="w-9 h-9 flex items-center justify-center rounded-lg text-gray-400 hover:bg-gold hover:text-black transition duration-200">
                        <i data-lucide="chevron-left" class="w-4 h-4"></i>
                    </a>
                @endif

                @foreach ($products->links()->elements[0] as $page => $url)
                    @if ($page == $products->currentPage())
                        <span class="w-9 h-9 flex items-center justify-center rounded-lg bg-gold text-black font-bold text-xs md:text-sm transition">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $products->appends(request()->query())->url($page) }}" class="w-9 h-9 flex items-center justify-center rounded-lg text-gray-400 hover:bg-white/5 hover:text-white font-medium text-xs md:text-sm transition duration-200">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach

                @if($products->hasMorePages())
                    <a href="{{ $products->appends(request()->query())->nextPageUrl() }}" class="w-9 h-9 flex items-center justify-center rounded-lg text-gray-400 hover:bg-gold hover:text-black transition duration-200">
                        <i data-lucide="chevron-right" class="w-4 h-4"></i>
                    </a>
                @else
                    <span class="w-9 h-9 flex items-center justify-center rounded-lg text-gray-700 cursor-not-allowed">
                        <i data-lucide="chevron-right" class="w-4 h-4"></i>
                    </span>
                @endif
            </div>
        </div>
    @endif

</div>

<div id="delete-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden animate-fade-in">
    <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" onclick="closeDeleteModal()"></div>
    
    <div class="card bg-[#141414] border border-gray-800 w-full max-w-md rounded-xl p-5 sm:p-6 relative z-10 transform scale-95 transition-transform duration-300 shadow-2xl">
        <div class="flex items-start gap-4">
            <div class="bg-amber-500/10 text-gold p-3 rounded-lg border border-amber-500/20 shrink-0">
                <i data-lucide="alert-triangle" class="w-6 h-6"></i>
            </div>
            <div class="flex-1 min-w-0">
                <h3 class="text-lg font-bold text-white tracking-wide">Hapus Produk?</h3>
                <p class="text-gray-400 text-sm mt-2 leading-relaxed break-words">
                    Apakah Anda yakin ingin menghapus produk <span id="modal-product-name" class="gold font-semibold"></span>? Tindakan ini bersifat permanen dan tidak dapat dibatalkan.
                </p>
            </div>
        </div>
        
        <div class="flex justify-end gap-3 mt-6 pt-4 border-t border-gray-800/60">
            <button type="button" onclick="closeDeleteModal()" class="bg-gray-800/60 hover:bg-gray-800 text-gray-300 px-4 py-2 rounded-lg text-sm font-medium transition duration-200 border border-gray-700/40">
                Batal
            </button>
            <button type="button" id="modal-confirm-btn" class="bg-gold hover:bg-yellow-400 text-black px-4 py-2 rounded-lg text-sm font-bold transition duration-200 shadow-lg shadow-yellow-500/10">
                Ya, Hapus
            </button>
        </div>
    </div>
</div>

<script>
let currentDeleteId = null;

function openDeleteModal(id, name) {
    currentDeleteId = id;
    document.getElementById('modal-product-name').textContent = name;
    const modal = document.getElementById('delete-modal');
    modal.classList.remove('hidden');
    
    document.getElementById('modal-confirm-btn').onclick = function() {
        if(currentDeleteId) {
            document.getElementById('delete-form-' + currentDeleteId).submit();
        }
    };
}

function closeDeleteModal() {
    const modal = document.getElementById('delete-modal');
    modal.classList.add('hidden');
    currentDeleteId = null;
}
</script>

<style>
    .scrollbar-hide::-webkit-scrollbar { display: none; }
    .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
</style>

@endsection