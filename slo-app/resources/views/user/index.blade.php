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
                        {{ __("Data ") }}
                        {{ request()->level }}
                    </div>
                    <x-secondary-button>
                        <x-nav-link :href="route('user.create', ['level' => request()->level])">
                            {{ __("+ Tambah ") }}
                            {{ request()->level }}
                        </x-nav-link>
                    </x-secondary-button>
                </div>
                <div class="py-6 px-3">
                    <table id="table" class="w-full table-auto rounded-lg p-3">
                        <thead>
                            <tr">
                                <th>#</th>
                                <th>Nama</th>
                                <th>Telp</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $u)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->telp }}</td>
                                <td>{{ $u->email }}</td>
                                <td>Tidak ditampilkan</td>
                                <td>
                                    <form action="{{ route('user.edit', ['level' => request()->level, 'id_user' => $u->id]) }}" method="get">
                                        <button class="rounded-md bg-yellow-400 my-1 p-2 hover:bg-yellow-800">
                                            Edit
                                        </button>
                                    </form>
                                    <form action="{{ route('user.destroy', ['level' => request()->level, 'id_user' => $u->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="rounded-md bg-red-400 my-1 p-2 hover:bg-red-800">
                                            Delete
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
