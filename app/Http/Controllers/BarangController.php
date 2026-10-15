<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BarangController extends Controller
{
    public function dashboard()
    {
        $totalAset = Barang::sum('stok');
        $unitTersedia = Barang::where('status', 'Tersedia')->sum('stok');
        $unitDipinjamMaintenance = Barang::whereIn('status', ['Dipinjam', 'Maintenance'])->sum('stok');

        return view('dashboard', compact('totalAset', 'unitTersedia', 'unitDipinjamMaintenance'));
    }

    public function index()
    {
        $barangs = Barang::with('kategori')->latest()->get();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('barang.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|string|max:20|unique:barangs,kode_barang',
            'nama_barang' => 'required|string|min:3|max:150',
            'kategori_id' => 'required|exists:kategoris,id',
            'spesifikasi' => 'nullable|string',
            'stok'        => 'required|integer|min:0',
            'kondisi'     => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'status'      => 'required|in:Tersedia,Dipinjam,Maintenance',
        ]);

        Barang::create($validated);

        return redirect()->route('barang.index')->with('success', 'Data inventaris berhasil ditambahkan!');
    }

    public function edit(Barang $barang)
    {
        $kategoris = Kategori::all();
        return view('barang.edit', compact('barang', 'kategoris'));
    }

    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'kode_barang' => ['required', 'string', 'max:20', Rule::unique('barangs')->ignore($barang->id)],
            'nama_barang' => 'required|string|min:3|max:150',
            'kategori_id' => 'required|exists:kategoris,id',
            'spesifikasi' => 'nullable|string',
            'stok'        => 'required|integer|min:0',
            'kondisi'     => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'status'      => 'required|in:Tersedia,Dipinjam,Maintenance',
        ]);

        $barang->update($validated);

        return redirect()->route('barang.index')->with('success', 'Data inventaris berhasil diperbarui!');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Data inventaris berhasil dihapus!');
    }
}