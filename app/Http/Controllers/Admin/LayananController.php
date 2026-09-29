<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->query('q');

        $layanan = layanan::when($keyword, function ($query, $keyword) {
            $query->where('nama_layanan', 'like', "%{$keyword}%");
        })
        ->orderBy('nama_layanan')
        ->paginate(10)
        ->withQueryString();

        return view('admin.layanan.index', compact('layanan', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_layanan' => 'required|string|max:100',
            'harga' => 'required|integer|min:0',
            'satuan' => 'required|string|max:20',
            'estimasi' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        Layanan::create($data);

        return redirect()->route('admin.layanan.index')
            ->with('succes', 'Layanan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Layanan $layanan)
    {
        return view('admin.layanan.edit', compact('layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Layanan $layanan)
    {
        $data = $request->validate([
            'nama_layanan' => 'required|string|max:100',
            'harga' => 'required|integer|min:0',
            'satuan' => 'required|string|max:20',
            'estimasi' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $layanan->update($data);

        return redirect()->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Layanan $layanan)
    {
        $layanan->delete();

        return redirect()->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil dihapus.');
    }
}
