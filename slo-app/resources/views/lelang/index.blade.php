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
                        {{ __("Data Lelang") }}
                    </div>
                    {{-- <x-secondary-button href>
                        <x-nav-link :href="route('lelang.create')">
                            {{ __("+ Tambah Data") }}
                        </x-nav-link>
                    </x-secondary-button> --}}
                </div>
                <div class="flex justify-center items-center py-6 px-3">
                    <table id="table" class="table">
                        <thead>
                            <tr">
                                <th>#</th>
                                <th>Nama Barang</th>
                                <th>Harga Awal</th>
                                <th>Harga Akhir</th>
                                <th>Pemenang</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lelangs as $l)
                            <tr>
                                <td> {{ $loop->iteration }}</td>
                                <td> {{ $l->data_barang->nama_barang }}</td>
                                <td>{{ $l->data_barang->harga_awal }}</td>
                                <td> {{ $l->harga_akhir }}</td>
                                <td>
                                    {{ $l->status == 'ditutup' && !is_null($l->id_masyarakat) ? $l->data_masyarakat->name : "Belum ada" }}
                                </td>
                                <td>
                                    <div>
                                        <img src="{{ asset($l->data_barang->foto_barang) }}" alt="foto_barang" class="w-48 h-auto">
                                    </div>
                                </td>
                                <td>
                                    {{ $l->status == '0' ? "tunda" : $l->status }}
                                </td>
                                <td>
                                    @if ($l->status == 'ditutup' || $l->status == '0')
                                    <form action="{{ route('lelang.buka', ['lelang' => $l->id_lelang]) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button class="rounded-md bg-green-400 my-1 p-2 hover:bg-green-800">
                                            Buka
                                        </button>
                                    </form>
                                    @endif
                                    @if ($l->status == 'dibuka')
                                    <form action="{{ route('lelang.tutup', ['lelang' => $l->id_lelang]) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button class="rounded-md bg-orange-400 my-1 p-2 hover:bg-orange-800">
                                            Tutup
                                        </button>
                                    </form>
                                    @endif
                                    <form action="{{ route('lelang.show', ['lelang' => $l->id_lelang]) }}" method="get">
                                        <button class="rounded-md bg-blue-400 my-1 p-2 hover:bg-blue-800">
                                            Show
                                        </button>
                                    </form>
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
