@php use Illuminate\Support\Str; @endphp

@extends('backend.layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-4 sm:py-6">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6 sm:mb-8">
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold tracking-wide text-white">Add New Product</h1>
            <p class="text-gray-400 text-xs sm:text-sm mt-1">Buat dan publikasikan menu baru ke katalog Mak Len Cake & Cookies.</p>
        </div>
        <a href="{{ route('admin.products.index') }}" class="w-full sm:w-auto justify-center border border-gray-700 text-gray-400 hover:bg-gray-900 hover:text-white px-4 py-2.5 rounded-xl text-xs sm:text-sm font-medium transition duration-200 flex items-center gap-2">
            <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali
        </a>
    </div>

    <div class="bg-[#121212] border border-white/5 rounded-2xl shadow-2xl p-4 sm:p-8">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5 sm:space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6">
                <div>
                    <label class="block text-gray-300 text-sm font-semibold mb-2">Nama Produk</label>
                    <input type="text" name="name" placeholder="Contoh: Bolen Pisang / Paket Hantaran Tampah" required
                        class="w-full p-3 bg-[#1c1c1e] border border-white/10 focus:border-[#fbbf24] focus:ring-1 focus:ring-[#fbbf24] rounded-xl text-white outline-none transition placeholder-gray-600 text-sm">
                </div>

                <div>
                    <label class="block text-gray-300 text-sm font-semibold mb-2">Harga (Rupiah)</label>
                    <div class="relative">
                        <span class="absolute left-4 top-3 text-gray-500 text-sm font-medium">Rp</span>
                        <input type="number" name="price" placeholder="0" min="0" required
                            class="w-full p-3 pl-10 bg-[#1c1c1e] border border-white/10 focus:border-[#fbbf24] focus:ring-1 focus:ring-[#fbbf24] rounded-xl text-white outline-none transition placeholder-gray-600 text-sm">
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-gray-300 text-sm font-semibold mb-2">Deskripsi Lengkap</label>
                <textarea name="description" rows="4" placeholder="Tuliskan detail produk, rasa, isian, info porsi hantaran, atau dekorasi hampers..." required
                    class="w-full p-3 bg-[#1c1c1e] border border-white/10 focus:border-[#fbbf24] focus:ring-1 focus:ring-[#fbbf24] rounded-xl text-white outline-none transition placeholder-gray-600 text-sm resize-none"></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6">
                <div class="space-y-5 sm:space-y-6">
                    <div>
                        <label class="block text-gray-300 text-sm font-semibold mb-2">Kategori Menu</label>
                        <div class="relative">
                            <select name="category_id" required 
                                class="w-full p-3 bg-[#1c1c1e] border border-white/10 focus:border-[#fbbf24] rounded-xl text-white outline-none transition text-sm appearance-none cursor-pointer pr-10">
                                <option value="" disabled selected>-- Pilih Kategori --</option>
                                @foreach($categories as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
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
                                <option value="publish" selected>
                                    Publish (Tampilkan di web)
                                </option>
                                <option value="best_seller">
                                    Best Seller (Tampil di Home & Katalog)
                                </option>
                                <option value="draft">
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
                    <div class="border-2 border-dashed border-white/10 hover:border-[#fbbf24]/50 rounded-xl p-4 sm:p-6 text-center bg-[#1c1c1e] transition relative group h-[166px] flex flex-col justify-center items-center overflow-hidden">
                        
                        <input type="file" name="image" id="product-image-input" required class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20">
                        
                        <div id="upload-placeholder" class="space-y-2 pointer-events-none flex flex-col items-center z-10 w-full px-2">
                            <i data-lucide="image-plus" class="w-8 h-8 text-gray-500 group-hover:text-[#fbbf24] transition duration-200"></i>
                            <p class="text-xs text-gray-400 leading-snug"><span class="text-[#fbbf24] font-medium">Klik untuk upload</span> atau seret foto ke sini</p>
                            <p class="text-[10px] text-gray-500">PNG, JPG, JPEG up to 2MB</p>
                        </div>

                        <div id="upload-preview-container" class="absolute inset-0 w-full h-full hidden z-10 bg-[#1c1c1e]">
                            <img id="upload-preview" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-200 flex items-center justify-center">
                                <span class="text-white text-xs font-medium bg-black/60 px-3 py-1.5 rounded-lg flex items-center gap-1.5">
                                    <i data-lucide="refresh-cw" class="w-3.5 h-3.5 animate-spin-slow"></i> Ganti Foto
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="pt-4 border-t border-white/5 flex justify-end">
                <button type="submit" class="w-full sm:w-auto bg-[#fbbf24] text-black hover:bg-[#e0a71f] px-6 py-3 sm:py-2.5 rounded-xl font-bold transition duration-200 text-xs sm:text-sm shadow-lg shadow-[#fbbf24]/10 tracking-wider sm:tracking-normal">
                    SIMPAN & PUBLIKASIKAN
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('product-image-input').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                document.getElementById('upload-preview').src = e.target.result;
                
                document.getElementById('upload-placeholder').classList.add('hidden');
                document.getElementById('upload-preview-container').classList.remove('hidden');
            }
            
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection