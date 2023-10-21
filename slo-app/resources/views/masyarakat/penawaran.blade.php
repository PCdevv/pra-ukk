<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x leading-tight">
            {{ __('Sarana Lelang Online') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  grid divide-y overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    {{ __("Data yang sudah saya tawar") }}
                </div>
                <div class="py-6 px-3">
                    <table id="table" class="w-full table table-lg table-auto rounded-lg">
                        <thead>
                            <tr">
                                <th>#</th>
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
                                @if ($p->data_lelang->status != 'ditutup')
                                    <td>Tunda</td>
                                @else
                                    <td>{{ $p->data_lelang->harga_akhir == $p->penawaran_harga ? 'Terpilih, Anda Menang!' : 'Tidak Terpilih'}}</td>
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