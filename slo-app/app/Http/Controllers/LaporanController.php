<?php

namespace App\Http\Controllers;

use App\Models\HistoryLelang;
use App\Models\Lelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class LaporanController extends Controller
{
    public function exportExcelLelang()
    {
        $filename = "penawarans-data-" . date("Y-m-d") . ".xls";
        $lelangs = Lelang::with('data_barang', 'data_petugas', 'data_masyarakat')->get();
        $excelData = $lelangs->isEmpty() ? "No records found..." : "No.\tNama Barang\tHarga Awal\tHarga Akhir\tPemenang\tPenginput\tTanggal\tStatus\n";
        foreach ($lelangs as $index => $lelang) {
            $excelData .= ($index + 1) . "\t" . $lelang->data_barang->nama_barang . "\t" . $lelang->data_barang->harga_awal . "\t" . $lelang->harga_akhir . "\t" .$lelang->data_masyarakat->name . "\t" . $lelang->data_petugas->name . "\t" . $lelang->tgl_lelang . "\t" . ($lelang->status == '0' ? 'tunda' : $lelang->status) . "\n";
        }
        return response($excelData, 200)
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', "attachment; filename=$filename");
    }
    // Todo
    public function exportExcelPenawaran()
    {
        // <th>No. </th>
        //                         <th>Pelelang</th>
        //                         <th>No Telp</th>
        //                         <th>Harga Penawaran</th>
        //                         <th>Status</th>
        $filename = "penawarans-data-" . date("Y-m-d") . ".xls";
        $penawarans = HistoryLelang::with('data_penawar', 'data_barang', 'data_petugas')->get();
        $excelData = $penawarans->isEmpty() ? "No records found..." : "No.\tNama Barang\tHarga Awal\tHarga Akhir\tPemenang\tPenginput\tTanggal\tStatus\n";
        foreach ($penawarans as $index => $penawaran) {
            $excelData .= ($index + 1) . "\t" . $penawaran->data_barang->nama_barang . "\t" . $penawaran->data_barang->harga_awal . "\t" . $penawaran->harga_akhir . "\tblm\tJohn Doe\t" . $penawaran->tgl_penawaran . "\t" . ($penawaran->status == '0' ? 'tunda' : $penawaran->status) . "\n";
        }
        return response($excelData, 200)
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', "attachment; filename=$filename");
    }
}
