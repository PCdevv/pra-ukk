<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\HistoryLelang;
use App\Models\Lelang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::get();
        return view('barang.index', ['barangs' => $barangs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'deskripsi_barang' => 'required',
            'harga_awal' => 'required',
            'foto_barang' => 'required',
        ]);

        $photo = $request->file('foto_barang');
        $path = $photo->storeAs('public/images', 'barang_' . uniqid() . '.' . $photo->extension());
        $directory = Storage::url($path);

        $barang = Barang::create([
            'nama_barang' => $request->nama_barang,
            'deskripsi_barang' => $request->deskripsi_barang,
            'harga_awal' => $request->harga_awal,
            'foto_barang' => $directory,
        ]);
        Lelang::create([
            'id_barang' => $barang->id_barang,
            'id_masyarakat' => null,
            'id_petugas' => $request->user()->id,
            'harga_akhir' => 0,
            'status' => '0'
        ]);
        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang, Request $request)
    {
        $histories = HistoryLelang::where('id_barang', $barang->id_barang)->get();
        $history = $histories->where('id_masyarakat', $request->user()->id)->first();
        $lelang = Lelang::where('id_barang', $barang->id_barang)->first();
        $pemenang = User::where('id', $lelang->id_masyarakat)->select('id', 'name')->first();
        return view('barang.show', [
            'barang' => $barang,
            'pemenang' => $pemenang,
            'history' => $history,
            'lelang' => $lelang,
            'histories' => $histories
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        // $barang_data = Barang::where('id_barang', 'barang')->first();
        return view('barang.edit', ['barang' => $barang]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang' => 'required',
            'deskripsi_barang' => 'required',
            'harga_awal' => 'required',
        ]);
        if (is_null($request->foto_barang)) {
            $request['foto_barang'] = $barang->foto_barang;
        }
        $barang->update([
            'nama_barang'=> $request->nama_barang,
            'deskripsi_barang'=> $request->deskripsi_barang,
            'harga_awal'=> $request->harga_awal,
            'foto_barang'=> $request->foto_barang,
        ]);
        return redirect('/data/barang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $lelang = Lelang::where('id_barang', $barang->id_barang)->first();
        $lelang->delete();
        $barang->delete();
        return redirect('/data/barang');
    }
}
