<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x leading-tight">
            {{ __('Sarana Lelang Online') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  grid divide-y overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6">
                    <div class="text-gray-900 ">
                        {{ __("Laporan Lelang") }}
                    </div>
                    <x-secondary-button href>
                        <x-nav-link :href="route('lelang-export-excel')" id="download-excel">
                            {{ __("Download EXCEL") }}
                        </x-nav-link>
                    </x-secondary-button>
                </div>
                <div class="py-6 px-3">
                    <table id="table" class="w-full table table-lg table-auto rounded-lg">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Barang</th>
                                <th>Harga Awal</th>
                                <th>Harga Akhir</th>
                                <th>Pemenang</th>
                                <th>Penginput</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lelangs as $l)
                            <tr>
                                <td> {{ $loop->iteration }}</td=>
                                <td> {{ $l->data_barang->nama_barang }}</td>
                                <td>{{ $l->data_barang->harga_awal }}</td>
                                <td> {{ $l->harga_akhir }}</td>
                                <td>{{$l->data_masyarakat->name}}</td>
                                <td>{{$l->data_petugas->name}}</td>
                                <td>{{ date('d/m/Y', strtotime($l->tgl_lelang)) }}</td>
                                <td>
                                    {{ $l->status == '0' ? "tunda" : $l->status }}
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('download-excel').addEventListener('click', function() {
            // Handle the Excel download and then redirect
            window.location.href = "{{ route('laporan.lelang') }}";
        });
    </script>
</x-app-layout>
