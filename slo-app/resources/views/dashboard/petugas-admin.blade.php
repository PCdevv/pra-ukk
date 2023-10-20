<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x leading-tight">
            {{ __('Sarana Lelang Online') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex justify-between gap-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex w-full bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-cyan-600 w-2 h-full"></div>
                <div class="p-6">
                    <div class="text-sm text-cyan-600">
                        {{ __('JUMLAH PETUGAS') }}
                    </div>
                    <div class="text-md text-gray-900">
                        {{ $jumlah_petugas }}
                    </div>
                </div>
            </div>
            <div class="flex w-full bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-indigo-600 w-2 h-full"></div>
                <div class="p-6">
                    <div class="text-sm text-indigo-600">
                        {{ __('JUMLAH BARANG') }}
                    </div>
                    <div class="text-md text-gray-900">
                        {{ $jumlah_barang }}
                    </div>
                </div>
            </div>
            <div class="flex w-full bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-green-600 w-2 h-full"></div>
                <div class="p-6">
                    <div class="text-sm text-green-600">
                        {{ __('JUMLAH LELANG') }}
                    </div>
                    <div class="text-md text-gray-900">
                        {{ $jumlah_lelang }}
                    </div>
                </div>
            </div>
            <div class="flex w-full bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-yellow-600 w-2 h-full"></div>
                <div class="p-6">
                    <div class="text-sm text-yellow-600">
                        {{ __('JUMLAH PENAWAR') }}
                    </div>
                    <div class="text-md text-gray-900">
                        {{ $jumlah_penawar }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('Data Lelang') }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>No. </thclass=>
                                <th>Nama Barang</th>
                                <th>Penawar</th>
                                <th>No. Telp</th>
                                <th>Harga Penawaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penawaran as $p) 
                            <tr>
                                <td> {{ $loop->iteration }}</td>
                                <td> {{ $p->data_barang->nama_barang }}</td>
                                <td> {{ $p->data_penawar->name }}</td>
                                <td>{{ $p->data_penawar->telp }}</td>
                                <td> {{ $p->penawaran_harga }}</td>
                            <tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
