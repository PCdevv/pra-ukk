<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\HistoryLelang;
use App\Models\Lelang;
use App\Models\User;
use Illuminate\Http\Request;

class PenawaranController extends Controller
{
    public function show_by_masyarakat(Request $request)
    {
        $penawarans = HistoryLelang::where('id_masyarakat', $request->user()->id)->with('data_barang', 'data_lelang')->get();
        return view('masyarakat.penawaran', ['penawarans' => $penawarans]);
    }

    public function detail(Barang $barang, Request $request)
    {
        $histories = HistoryLelang::where('id_barang', $barang->id_barang)->with('data_penawar', 'data_lelang')->get();
        $history = $histories->where('id_masyarakat', $request->user()->id)->sortByDesc('harga_penawaran')->first();
        $lelang = Lelang::where('id_barang', $barang->id_barang)->first();
        $pemenang = User::where('id', $lelang->id_masyarakat)->select('id', 'name')->first();
        return view('masyarakat.lelang', [
            'barang' => $barang,
            'pemenang' => $pemenang,
            'history' => $history,
            'lelang' => $lelang,
            'histories' => $histories
        ]);
    }

    public function tawarkan(Barang $barang, Request $request)
    {
        $request->validate([
            'penawaran_harga' => 'required'
        ]);
        if ($request->penawaran_harga < $barang->harga_awal) {
            return redirect()->back()->withErrors(['penawaran_harga' => 'Penawaran harus lebih dari Harga Awal']);
        }
        $lelang = Lelang::where('id_barang', $barang->id_barang)->first();
        HistoryLelang::create([
            'id_lelang' => $lelang->id_lelang,
            'id_barang' => $barang->id_barang,
            'id_masyarakat' => $request->user()->id,
            'penawaran_harga' => $request->penawaran_harga,
        ]);
        if ($request->penawaran_harga > $lelang->harga_akhir) {
            $lelang->update([
                'id_masyarakat' => $request->user()->id,
                'harga_akhir' => $request->penawaran_harga
            ]);
        }
        return redirect('/lelang/' . $barang->id_barang);
    }

    public function edit_tawaran(Barang $barang, Request $request)
    {
        $histories = HistoryLelang::where('id_barang', $barang->id_barang)->get();
        $history = $histories->where('id_masyarakat', $request->user()->id)->sortByDesc('harga_penawaran')->first();
        $lelang = Lelang::where('id_barang', $barang->id_barang)->first();
        $pemenang = User::where('id', $lelang->id_masyarakat)->select('id', 'name')->first();
        return view('masyarakat.edit-lelang', [
            'barang' => $barang,
            'pemenang' => $pemenang,
            'history' => $history,
            'lelang' => $lelang,
            'histories' => $histories
        ]);
    }

    public function update_tawaran(Barang $barang, Request $request)
    {
        $histories = HistoryLelang::where('id_barang', $barang->id_barang)->get();
        $history = $histories->where('id_masyarakat', $request->user()->id)->sortByDesc('harga_penawaran')->first();
        $request->validate([
            'penawaran_harga' => 'required'
        ]);
        if ($request->penawaran_harga < $history->penawaran_harga) {
            return redirect()->back()->withErrors(['penawaran_harga' => 'Penawaran harus lebih dari Harga Awal']);
        }
        $history->update(['penawaran_harga' => $request->penawaran_harga]);
        return redirect('/lelang/' . $barang->id_barang);
    }

}
