<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Produk::select('nama_produk', 'kategori_id', 'stok_id')
            ->with('kategori', 'stok')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        $stok_tersedia = Produk::select('stok_id')
            ->where('stok_id', '>', 0)
            ->count();

        $stok_habis = Produk::select('stok_id')
            ->where('stok_id', '=', 0)
            ->count();

        $stok_segera_habis = Produk::select('stok_id')  
            ->where('stok_id', '<=', 10)
            ->count();

        return view('pages.dashboard.index', compact('data', 'stok_tersedia', 'stok_habis', 'stok_segera_habis'));
    }
}

