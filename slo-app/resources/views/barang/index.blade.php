<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x leading-tight">
            {{ __('Sarana Lelang Online') }}
        </h2>
    </x-slot>

    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between p-6  bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900">
                    {{ __('Data Barang') }}
                </div>
                <x-secondary-button>
                    <x-nav-link :href="route('barang.create')">
                        {{ __("+ Tambah Data") }}
                    </x-nav-link>
                </x-secondary-button>
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
                                <th class="text-center">#</th>
                                <th class="text-center">Nama Barang</th>
                                <th class="text-center">Harga Awal</th>
                                <th class="text-center">Foto Barang</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs as $b)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $b->nama_barang }}</td>
                                <td>{{ $b->harga_awal }}</td>
                                <td><img src="{{asset($b->foto_barang)}}" alt="foto_barang" class="w-48 h-auto"></td>
                                <td>{{ date('d/m/Y', strtotime($b->tgl)) }}</td>
                                <td>
                                    <form action="{{ route('barang.edit', ['barang' => $b->id_barang]) }}" method="get">
                                        <button class="rounded-md bg-yellow-400 my-1 p-2 hover:bg-yellow-800">
                                            Edit
                                        </button>
                                    </form>
                                    <form action="{{ route('barang.show', ['barang' => $b->id_barang]) }}" method="get">
                                        <button class="rounded-md bg-blue-400 my-1 p-2 hover:bg-blue-800">
                                            Show
                                        </button>
                                    </form>
                                    <form action="{{ route('barang.destroy', ['barang' => $b->id_barang]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="rounded-md bg-red-400 my-1 p-2 hover:bg-red-800">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
