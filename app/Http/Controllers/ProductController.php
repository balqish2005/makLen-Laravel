<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // ⚡ TAMBAHKAN INI DI ATAS
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * DISPLAY DATA + FILTER CATEGORY + SEARCH (FRONTEND & BACKEND)
     */
    public function index(Request $request)
    {
        // ─── 1. LOGIC UNTUK HALAMAN ADMIN ───
        if ($request->is('admin*')) {
            $categories = Category::all();
            
            // ⚡ TAMBAHAN BARU: HITUNG STATISTIK UNTUK WIDGET ADMIN
            $countPublish = Product::where('status', 'publish')->count();
            $countBestSeller = Product::where('status', 'best_seller')->count();
            $countDraft = Product::where('status', 'draft')->count();

            // Mengambil total per kategori secara dinamis
            $categoryCounts = [];
            foreach ($categories as $cat) {
                $categoryCounts[$cat->name] = Product::where('category_id', $cat->id)->count();
            }
            
            // ─── CODE LAMA KAMU DI BAWAH INI TETAP UTUH & AMAN ───
            
            // Inisialisasi query & Urutkan Produk secara Alfabet (A-Z)
            $query = Product::with('category')->orderBy('name', 'asc');

            // Fitur Filter Kategori Admin (Berdasarkan category_id dari tombol)
            if ($request->has('category') && $request->category != '') {
                $query->where('category_id', $request->category);
            }

            // Fitur Pencarian Admin (Mencari di seluruh database/halaman)
            if ($request->has('search') && $request->search != '') {
                $query->where('name', 'like', '%' . $request->search . '%');
            }

            // Paginate data dan amankan query string (search & category) agar tidak hilang saat ganti halaman
            $products = $query->paginate(10)->appends($request->all());
            
            
            // ⚡ TAMBAHAN BARU: Masukkan variabel statistik ke dalam compact() bersama data lama
            return view('backend.products.index', compact(
                'products', 
                'categories', 
                'countPublish', 
                'countBestSeller', 
                'countDraft', 
                'categoryCounts'
            ));
        }

        // ─── 2. LOGIC UNTUK HALAMAN FRONTEND / KATALOG ───
        $categories = Category::all();
        $query = Product::with('category')
                        ->whereIn('status', ['publish', 'best_seller'])
                        ->orderBy('name', 'asc'); // Urutan A-Z

        // ⚡ PERBAIKAN: COCOKKAN SLUG BUTTON KATEGORI BLADE DENGAN DATABASE
        if ($request->has('category') && $request->category != 'all' && $request->category != '') {
            $query->whereHas('category', function($q) use ($request) {
                // Ambil semua kategori dari DB, cari yang jika di-slug-kan nilainya sama dengan request
                $categories = Category::all();
                $targetId = null;
                foreach ($categories as $cat) {
                    if (Str::slug($cat->name) === $request->category) {
                        $targetId = $cat->id;
                        break;
                    }
                }
                $q->where('id', $targetId);
            });
        }

        // SEARCH LEBIH RELEVAN
        if ($request->filled('search')) {

            $search = trim($request->search);

            $query->where(function ($q) use ($search) {

                // PRIORITAS 1 → nama produk paling relevan
                $q->where('name', 'LIKE', "%{$search}%")

                // PRIORITAS 2 → deskripsi
                ->orWhere('description', 'LIKE', "%{$search}%")

                // PRIORITAS 3 → kategori
                ->orWhereHas('category', function ($cat) use ($search) {
                    $cat->where('name', 'LIKE', "%{$search}%");
                });
            });

    // BONUS: hasil paling relevan muncul dulu
    $query->orderByRaw("
        CASE
            WHEN name LIKE ? THEN 1
            WHEN name LIKE ? THEN 2
            WHEN description LIKE ? THEN 3
            ELSE 4
        END
    ", [
        "{$search}%",
        "%{$search}%",
        "%{$search}%"
    ]);
}

        // Amankan query string pencarian dan kategori agar pagination link-nya tidak rusak
        $products = $query->paginate(12)->appends($request->all());
        if ($request->ajax()) {
            return view('frontend.products.index', compact('products', 'categories'))->render();
        }

        return view('frontend.products.index', compact('products', 'categories'));
    }

    /**
     * FORM TAMBAH
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.products.create', compact('categories'));
    }

    /**
     * SIMPAN DATA
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'image' => 'required|image',
            'status' => 'required|in:publish,draft,best_seller',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'image' => $path ?? null,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil disimpan');
    }

    /**
     * FORM EDIT
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('backend.products.edit', compact('product', 'categories'));
    }

    /**
     * UPDATE DATA
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'image' => 'nullable|image',
            'status' => 'required|in:publish,draft,best_seller',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui');
    }

    /**
     * HAPUS DATA
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus');
    }

    /**
     * FUNGSI KATALOG CUSTOM (JIKA ROUTE TERPISAH)
     */
    public function katalog(Request $request)
    {
        // Query dasar produk berstatus publish
        $query = Product::with('category')->where('status', 'publish');

        // ⚡ PERBAIKAN: SINKRONISASI SLUG PADA KATALOG CUSTOM
        if ($request->has('category') && $request->category != 'all') {
            $query->whereHas('category', function($q) use ($request) {
                $categories = Category::all();
                $targetId = null;
                foreach ($categories as $cat) {
                    if (Str::slug($cat->name) === $request->category) {
                        $targetId = $cat->id;
                        break;
                    }
                }
                $q->where('id', $targetId);
            });
        }

        // Filter berdasarkan Kata Kunci Search bar
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('description', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        // Mengamankan parameter append link paginasi halaman katalog custom
        $products = $query->latest()->paginate(12)->appends($request->all());

        return view('frontend.katalog', compact('products'));
    }

    // ===============================
    // SEARCH SUGGESTIONS (AJAX)
    // ===============================
    public function searchSuggestions(Request $request)
    {
        $search = trim($request->search);

        if (!$search) return response()->json([]);

        $products = Product::with('category')
            ->whereIn('status', ['publish', 'best_seller'])
            ->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->orWhereHas('category', fn($c) =>
                        $c->where('name', 'LIKE', "%{$search}%")
                );
            })
            ->orderByRaw("
                CASE
                    WHEN name LIKE ? THEN 1
                    WHEN name LIKE ? THEN 2
                    ELSE 3
                END
            ", ["{$search}%", "%{$search}%"])
            ->limit(8)
            ->get();

        return response()->json($products);
    }
}