@php use Illuminate\Support\Str; @endphp

@extends('backend.layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-4 sm:py-6">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6 sm:mb-8">
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold tracking-wide text-white">Edit Product</h1>
            <p class="text-gray-400 text-xs sm:text-sm mt-1">Perbarui detail, harga, atau ketersediaan menu Mak Len Cake & Cookies.</p>
        </div>
        <a href="{{ route('admin.products.index') }}" class="w-full sm:w-auto justify-center border border-gray-700 text-gray-400 hover:bg-gray-900 hover:text-white px-4 py-2.5 rounded-xl text-xs sm:text-sm font-medium transition duration-200 flex items-center gap-2">
            <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="bg-red-950/40 border border-red-800 text-red-400 p-4 rounded-xl mb-6 text-sm">
            <div class="flex items-center gap-2 font-bold mb-1 text-red-300">
                ⚠️ Ada kesalahan pengisian form:
            </div>
            <ul class="list-disc list-inside space-y-1 opacity-90">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-[#121212] border border-white/5 rounded-2xl shadow-2xl p-4 sm:p-8">
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5 sm:space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6">
                <div>
                    <label class="block text-gray-300 text-sm font-semibold mb-2">Nama Produk</label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" required
                        class="w-full p-3 bg-[#1c1c1e] border border-white/10 focus:border-[#fbbf24] focus:ring-1 focus:ring-[#fbbf24] rounded-xl text-white outline-none transition text-sm">
                </div>

                <div>
                    <label class="block text-gray-300 text-sm font-semibold mb-2">Harga (Rupiah)</label>
                    <div class="relative">
                        <span class="absolute left-4 top-3 text-gray-500 text-sm font-medium">Rp</span>
                        <input type="number" name="price" value="{{ old('price', $product->price) }}" min="0" required
                            class="w-full p-3 pl-10 bg-[#1c1c1e] border border-white/10 focus:border-[#fbbf24] focus:ring-1 focus:ring-[#fbbf24] rounded-xl text-white outline-none transition text-sm">
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-gray-300 text-sm font-semibold mb-2">Deskripsi Lengkap</label>
                <textarea name="description" rows="4" required placeholder="Tuliskan detail produk, rasa, isian, info porsi hantaran, atau dekorasi hampers..."
                    class="w-full p-3 bg-[#1c1c1e] border border-white/10 focus:border-[#fbbf24] focus:ring-1 focus:ring-[#fbbf24] rounded-xl text-white outline-none transition text-sm resize-none">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6">
                <div class="space-y-5 sm:space-y-6">
                    <div>
                        <label class="block text-gray-300 text-sm font-semibold mb-2">Kategori Menu</label>
                        <div class="relative">
                            <select name="category_id" required 
                                class="w-full p-3 bg-[#1c1c1e] border border-white/10 focus:border-[#fbbf24] rounded-xl text-white outline-none transition text-sm cursor-pointer appearance-none pr-10">
                                @foreach($categories as $c)
                                    <option value="{{ $c->id }}" {{ old('category_id', $product->category_id) == $c->id ? 'selected' : '' }}>
                                        {{ $c->name }}
                                    </option>
                                @endforeach
                            </select>
                            
                            <div class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                            </div>
                        </div>
                    </div>
                        
                    <div>
                        <label class="flex items-center gap-2 text-gray-300 text-sm font-semibold mb-2">
                            <i data-lucide="eye" class="w-4 h-4 text-gray-400"></i>
                            <span>Status Publikasi</span>
                        </label>
                        
                        <div class="relative">
                            <select name="status" required 
                                class="w-full p-3 bg-[#1c1c1e] border border-white/10 focus:border-[#fbbf24] rounded-xl text-white outline-none transition text-sm cursor-pointer appearance-none pr-10">
                                <option value="publish" {{ old('status', $product->status) == 'publish' ? 'selected' : '' }}>
                                    Publish (Tampilkan di web)
                                </option>
                                <option value="best_seller" {{ old('status', $product->status) == 'best_seller' ? 'selected' : '' }}>
                                    Best Seller (Tampil di Home & Katalog)
                                </option>
                                <option value="draft" {{ old('status', $product->status) == 'draft' ? 'selected' : '' }}>
                                    Draft (Simpan internal)
                                </option>
                            </select>
                            
                            <div class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-gray-300 text-sm font-semibold mb-2">Foto Produk</label>
                    <div class="border-2 border-dashed border-white/10 hover:border-[#fbbf24]/50 rounded-xl p-4 bg-[#1c1c1e] transition relative group h-auto sm:h-[166px] flex flex-col sm:flex-row items-center sm:items-center gap-4 overflow-hidden">
                        
                        <div class="w-24 h-24 rounded-lg overflow-hidden border border-white/10 bg-black flex-shrink-0 relative z-10 mx-auto sm:mx-0">
                            @if($product->image)
                                <img id="edit-preview" src="{{ asset('storage/'.$product->image) }}" alt="Product Image" class="w-full h-full object-cover">
                            @else
                                <div id="edit-preview-empty" class="w-full h-full bg-gray-800 flex items-center justify-center text-[10px] text-gray-500">No Img</div>
                                <img id="edit-preview" class="w-full h-full object-cover hidden">
                            @endif
                            <span id="badge-status" class="absolute bottom-0 left-0 right-0 bg-black/70 text-[9px] text-center text-gray-400 py-0.5 transition duration-200">Aktif</span>
                        </div>

                        <div class="flex-1 text-center sm:text-left relative h-full flex flex-col justify-center z-10 pb-2 sm:pb-0">
                            <input type="file" name="image" id="edit-image-input" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20">
                            <div class="pointer-events-none space-y-1">
                                <p id="text-title" class="text-xs text-gray-300 group-hover:text-[#fbbf24] font-medium transition flex items-center justify-center sm:justify-start gap-1">
                                    <i data-lucide="image" class="w-3.5 h-3.5"></i> Ganti Foto Baru
                                </p>
                                <p class="text-[11px] text-gray-500 leading-snug">Klik atau seret file baru ke sini jika ingin memperbarui foto kue</p>
                                <p class="text-[9px] text-gray-600 uppercase mt-1">PNG, JPG up to 2MB</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="pt-4 border-t border-white/5 flex justify-end">
                <button type="submit" class="w-full sm:w-auto bg-[#fbbf24] text-black hover:bg-[#e0a71f] px-6 py-3 sm:py-2.5 rounded-xl font-bold transition duration-200 text-xs sm:text-sm shadow-lg shadow-[#fbbf24]/10 tracking-wider sm:tracking-normal">
                    UPDATE PERUBAHAN
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('edit-image-input').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const previewImg = document.getElementById('edit-preview');
                const emptyPreview = document.getElementById('edit-preview-empty');
                
                previewImg.src = e.target.result;
                
                if (emptyPreview) {
                    emptyPreview.classList.add('hidden');
                }
                previewImg.classList.remove('hidden');
                
                const badge = document.getElementById('badge-status');
                badge.textContent = "Baru (Belum Disimpan)";
                badge.classList.remove('bg-black/70', 'text-gray-400');
                badge.classList.add('bg-[#fbbf24]', 'text-black', 'font-bold');

                document.getElementById('text-title').classList.add('text-[#fbbf24]');
            }
            
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection