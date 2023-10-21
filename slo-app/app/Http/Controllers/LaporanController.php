<?php

namespace App\Http\Controllers;

use App\Models\HistoryLelang;
use App\Models\Lelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class LaporanController extends Controller
{
    public function laporan_lelang()
    {
        $lelangs = Lelang::with('data_barang', 'data_petugas')->get();
        // return $lelangs;
        return view('laporan.lelang', ['lelangs' => $lelangs]);
    }
    public function laporan_penawaran()
    {
        $penawaran = HistoryLelang::orderBy('penawaran_harga', 'desc')->with('data_penawar', 'data_barang')->get();
        return view('laporan.penawaran', ['penawaran' => $penawaran]);
    }
    public function exportExcelLelang()
    {
        $filename = "lelangs-data-" . date("Y-m-d") . ".xls";
        $lelangs = Lelang::with('data_barang', 'data_petugas', 'data_masyarakat')->get();
        $excelData = $lelangs->isEmpty() ? "No records found..." : "No.\tNama Barang\tHarga Awal\tHarga Akhir\tPemenang\tPenginput\tTanggal\tStatus\n";
        foreach ($lelangs as $index => $lelang) {
            $excelData .= ($index + 1) . "\t" . $lelang->data_barang->nama_barang . "\t" . $lelang->data_barang->harga_awal . "\t" . $lelang->harga_akhir . "\t" . $lelang->data_masyarakat->name . "\t" . $lelang->data_petugas->name . "\t" . $lelang->tgl_lelang . "\t" . ($lelang->status == '0' ? 'tunda' : $lelang->status) . "\n";
        }
        return response($excelData, 200)
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', "attachment; filename=$filename");
    }
    // Todo
    public function exportExcelPenawaran()
    {
        $filename = "penawarans-data-" . date("Y-m-d") . ".xls";
        $penawarans = HistoryLelang::orderBy('penawaran_harga', 'desc')->with('data_penawar', 'data_lelang')->get();
        $excelData = $penawarans->isEmpty() ? "No records found..." : "No.\tNama Barang\tPenawar\tTelp\tHarga Penawaran\tStatus\n";
        foreach ($penawarans as $index => $penawaran) {
            $excelData .= ($index + 1) . "\t" . $penawaran->data_barang->nama_barang . "\t" . $penawaran->data_penawar->name . "\t" . $penawaran->data_penawar->telp . "\t" . $penawaran->penawaran_harga . "\t" . ($penawaran->data_lelang->status != 'ditutup' ? 'Tunda' : ($penawaran->data_lelang->harga_akhir == $penawaran->penawaran_harga ? 'Terpilih' : 'Tidak Terpilih')) . "\n";
        }
        return response($excelData, 200)
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', "attachment; filename=$filename");
    }
}
