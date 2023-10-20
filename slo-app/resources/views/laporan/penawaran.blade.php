<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x leading-tight">
            {{ __('Sarana Lelang Online') }}
        </h2>
    </x-slot>

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid divide-y bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6">
                    <div class="text-gray-900 dark:text-gray-100">
                        {{ __("Laporan Penawaran Lelang") }}
                    </div>
                    <x-secondary-button href>
                        <x-nav-link :href="route('lelang.create')">
                            {{ __("Download EXCEL") }}
                        </x-nav-link>
                    </x-secondary-button>
                </div>
                <div class="flex justify-center items-center py-6 px-3">
                    <table class="w-full table-auto rounded-lg p-3 bg-gray-800 dark:bg-white text-white dark:text-black">
                        <thead>
                            <tr">
                                    <th>No. </th>
                                    <th>Nama Barang</th>
                                    <th>Penawar</th>
                                    <th>No. Telp</th>
                                    <th>Harga Penawaran</th>
                                    <th>Status</th>
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
                                <td></td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
