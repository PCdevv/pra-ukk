<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x leading-tight">
            {{ __('Sarana Lelang Online') }}
        </h2>
    </x-slot>

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid divide-y bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6">
                    <div class="text-gray-900 ">
                        {{ __("Laporan Penawaran Lelang") }}
                    </div>
                    <x-secondary-button href>
                        <x-nav-link :href="route('penawaran-export-excel')">
                            {{ __("Download EXCEL") }}
                        </x-nav-link>
                    </x-secondary-button>
                </div>
                <div class="py-6 px-3">
                    <table id="table" class="w-full table-auto rounded-lg">
                        <thead>
                            <tr">
                                    <th>#</th>
                                    <th>Nama Barang</th>
                                    <th>Penawar</th>
                                    <th>Telp</th>
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
                                @if ($p->data_lelang->status != 'ditutup')
                                    <td>Tunda</td>
                                @else
                                    <td>{{ $p->data_lelang->harga_akhir == $p->penawaran_harga ? 'Terpilih' : 'Tidak Terpilih'}}</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('download-excel').addEventListener('click', function() {
            // Handle the Excel download and then redirect
            window.location.href = "{{ route('laporan.penawaran') }}";
        });
    </script>
</x-app-layout>
