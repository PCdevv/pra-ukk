<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\HistoryLelang;
use App\Models\Lelang;
use App\Models\User;
use Illuminate\Http\Request;

class LelangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lelangs = Lelang::with('data_barang', 'data_masyarakat')->get();
        // return $lelangs;
        return view('lelang.index', ['lelangs' => $lelangs]);
    }
    public function laporan_lelang()
    {
        $lelangs = Lelang::with('data_barang', 'data_petugas')->get();
        // return $lelangs;
        return view('laporan.lelang', ['lelangs' => $lelangs]);
    }
    public function laporan_penawaran()
    {
        $penawaran = HistoryLelang::with('data_penawar', 'data_barang', 'data_petugas')->get();
        return view('laporan.penawaran', ['penawaran' => $penawaran]);
    }
    // public function index_penawaran()
    // {
    //     return view('penawaran.index');
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs =  Barang::where('status', 'ditutup')->get();
        return view('lelang.create', ['barangs' => $barangs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required'
        ]);
        Lelang::create([
            'id_barang' => $request->id_barang,
            'id_masyarakat' => null,
            'id_petugas' => $request->user()->id,
            'harga_akhir' => 0,
            'status' => 'dibuka'
        ]);
        return redirect('/data/lelang');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lelang $lelang, Request $request)
    {
        $barang = $lelang->with('data_barang')->first()->data_barang;
        $histories = HistoryLelang::where('id_barang', $barang->id_barang)->with('data_penawar', 'data_lelang')->get();
        $history = $histories->where('id_masyarakat', $request->user()->id)->first();
        $lelang = Lelang::where('id_barang', $barang->id_barang)->first();
        $pemenang = User::where('id', $lelang->id_masyarakat)->select('id', 'name')->first();
        // return $histories;
        return view('lelang.show', [
            'barang' => $barang,
            'pemenang' => $pemenang,
            'history' => $history,
            'lelang' => $lelang,
            'histories' => $histories
        ]);
    }

    public function buka(Lelang $lelang)
    {
        $lelang->update(['status' => 'dibuka']);
        return redirect('/data/lelang');
    }
    public function tutup(Lelang $lelang)
    {
        $lelang->update(['status' => 'ditutup']);
        return redirect('/data/lelang');
    }
    public function pilih_pemenang(Request $request)
    {
        $lelang = Lelang::where('id_barang', $request->id_barang);
        $penawaran = HistoryLelang::where('id_history', $request->id_history);

        $lelang->update([
            'id_masyarakat' => $penawaran->id_masyarakat,
            'harga_akhir' => $penawaran->penawaran_harga,
        ]);
        $penawaran->update([
            'id_lelang' => $lelang->id_lelang,
        ]);
        return redirect('/data/penawaran');
    }
    public function batal_pilih(Request $request)
    {
        $lelang = Lelang::where('id_barang', $request->id_barang);
        $penawaran = HistoryLelang::where('id_history', $request->id_history);

        $lelang->update([
            'id_masyarakat' => null,
            'harga_akhir' => null,
        ]);
        $penawaran->update([
            'id_lelang' => null,
        ]);
        return redirect('/data/penawaran');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lelang $lelang)
    {
        return view('lelang.edit', ['lelang' => $lelang]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lelang $lelang)
    {
        $request->validate([]);
        $lelang->update($request->all());
        return redirect('/data/lelang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lelang $lelang)
    {
        //
    }
}
