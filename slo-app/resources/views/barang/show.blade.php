<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x leading-tight">
            {{ __('Sarana Lelang Online') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-4 grid divide-y bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6">
                    <div class="text-gray-900 ">
                        {{ __("Detail") }}
                    </div>
                </div>
                <div class="flex justify-start items-center p-6">
                    <img src="{{ asset($barang->foto_barang) }}" alt="foto_barang" class="w-56 h-auto">
                    <div class="flex flex-col justify-between h-full px-16">
                        <div class="text-gray-900 ">
                            {{ __("Nama Barang : ") }}
                            {{ $barang->nama_barang }}
                        </div>
                        <div class="text-gray-900 ">
                            {{ __("Tanggal : ") }}
                            {{ date('d/m/Y', strtotime($barang->tgl)) }}
                        </div>
                        <div class="text-gray-900 ">
                            {{ __("Harga Awal : ") }}
                            {{ $barang->harga_awal }}
                        </div>
                        <div class="text-gray-900 ">
                            {{ __("Deskripsi : ") }}
                            {{ $barang->deskripsi_barang }}
                        </div>
                        <div class="text-gray-900 ">
                            {{ __("Status : ") }}
                            {{ $lelang->status == '0' ? 'Tunda' : $lelang->status}}
                        </div>
                        <div class="text-gray-900 ">
                            {{ __("Pemenang : ") }}
                            {{ $lelang->status == 'ditutup' && !is_null($pemenang) ? $pemenang->name : "Belum ada" }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-4 grid divide-y bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6">
                    <div class="text-gray-900 ">
                        {{ __("Data-data Pelelang") }}
                        {{ $barang->nama_barang }}
                    </div>
                </div>
                <div class="p-6">
                    <table id="table" class="w-full table table-lg table-auto rounded-lg">
                        <thead>
                            <tr">
                                <th>No. </th>
                                <th>Pelelang</th>
                                <th>No Telp</th>
                                <th>Harga Penawaran</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($histories as $h)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$h->data_penawar->name}}</td>
                                <td>{{$h->data_penawar->telp}}</td>
                                <td>{{ $h->penawaran_harga }}</td>
                                @if ($lelang->status != 'ditutup')
                                    <td>Tunda</td>
                                @else
                                    <td>{{ $lelang->harga_akhir == $h->penawaran_harga ? 'Terpilih' : 'Tidak Terpilih'}}</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
