<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->query('q');

        $pelanggan = Pelanggan::when($keyword, function ($query, $keyword) {
                $query->where('nama_pelanggan', 'like', "%{$keyword}%")
                      ->orWhere('no_hp', 'like', "%{$keyword}%")
                      ->orWhere('username', 'like', "%{$keyword}%");
            })
            ->orderBy('nama_pelanggan')
            ->paginate(10)
            ->withQueryString();

        return view('admin.pelanggan.index', compact('pelanggan', 'keyword'));
    }

    public function create()
    {
        return view('admin.pelanggan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'username' => 'required|string|max:50|unique:pelanggan,username',
            'password' => 'required|string|min:6',
        ]);

        $data['password'] = Hash::make($data['password']);

        Pelanggan::create($data);

        return redirect()->route('admin.pelanggan.index')
            ->with('success', 'Data pelanggan berhasil ditambahkan.');
    }

    public function edit(Pelanggan $pelanggan)
    {
        return view('admin.pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $data = $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'username' => 'required|string|max:50|unique:pelanggan,username,' . $pelanggan->id_pelanggan . ',id_pelanggan',
            'password' => 'nullable|string|min:6',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $pelanggan->update($data);

        return redirect()->route('admin.pelanggan.index')
            ->with('success', 'Data pelanggan berhasil diperbarui.');
    }

    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

        return redirect()->route('admin.pelanggan.index')
            ->with('success', 'Data pelanggan berhasil dihapus.');
    }
}