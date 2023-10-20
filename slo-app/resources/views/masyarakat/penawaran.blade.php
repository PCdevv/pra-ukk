<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x leading-tight">
            {{ __('Sarana Lelang Online') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 grid divide-y overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Data yang sudah saya tawar") }}
                </div>
                <div class="py-6 px-3">
                    <table id="table" class="w-full table table-lg table-auto rounded-lg">
                        <thead>
                            <tr">
                                <th>No. </th>
                                <th>Nama Barang</th>
                                <th>Harga Penawaran</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penawarans as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->data_barang->nama_barang }}</td>
                                <td>{{ $p->penawaran_harga }}</td>
                                <td>{{ $p->data_lelang->id_masyarakat == Auth::user()->id ? 'Anda Terpilih' : 'Anda Tidak Terpilih' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>