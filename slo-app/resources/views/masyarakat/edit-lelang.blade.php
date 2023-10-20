<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x leading-tight">
            {{ __('Sarana Lelang Online') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-4 grid divide-y bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6">
                    <div class="text-gray-900 dark:text-gray-100">
                        {{ __("Detail") }}
                    </div>
                </div>
                <div class="flex justify-start items-center p-6">
                    <img src="{{ asset($barang->foto_barang) }}" alt="foto_barang" class="w-56 h-auto">
                    <div class="flex flex-col justify-between h-full px-16">
                        <div class="text-gray-900 dark:text-gray-100">
                            {{ __("Nama Barang : ") }}
                            {{ $barang->nama_barang }}
                        </div>
                        <div class="text-gray-900 dark:text-gray-100">
                            {{ __("Tanggal : ") }}
                            {{ $barang->tgl }}
                        </div>
                        <div class="text-gray-900 dark:text-gray-100">
                            {{ __("Harga Awal : ") }}
                            {{ $barang->harga_awal }}
                        </div>
                        <div class="text-gray-900 dark:text-gray-100">
                            {{ __("Deskripsi : ") }}
                            {{ $barang->deskripsi_barang }}
                        </div>
                        <div class="text-gray-900 dark:text-gray-100">
                            {{ __("Status : ") }}
                            {{ $lelang->status }}
                        </div>
                        <div class="text-gray-900 dark:text-gray-100">
                            {{ __("Pemenang : ") }}
                            {{ $lelang->status == 'ditutup' && !is_null($pemenang) ? $pemenang->name : "Belum ada" }}
                        </div>
                    </div>
                </div>
            </div>
            <div id="edit" class="my-4 grid divide-y bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6">
                    <div class="text-gray-900 dark:text-gray-100">
                        {{ __("Penawaran ") }}
                        {{ $barang->nama_barang }}
                    </div>
                </div>
                <form method="POST" action="{{ route('lelang.tawarkan', ['barang' => $barang->id_barang]) }}" class="flex flex-col justify-center items-start p-6 gap-4">
                    @csrf
                    <x-input-label>Edit Tawaran</x-input-label>
                    <x-text-input type="number" name="penawaran_harga" class="w-full @required(true)" :value="old('penawaran_harga', $history->penawaran_harga)" />
                    <x-input-error :messages="$errors->get('penawaran_harga')" class="mt-2" />
                    <x-primary-button class="self-end">
                            Tawarkan
                    </x-primary-button>
                </form>
            </div>
            <div class="my-4 grid divide-y bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6">
                    <div class="text-gray-900 dark:text-gray-100">
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
                                {{-- <th>Status</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($histories as $h)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$h->data_penawar->name}}</td>
                                <td>{{$h->data_penawar->telp}}</td>
                                <td>{{ $h->penawaran_harga }}</td>
                                {{-- <td>hehe</td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
