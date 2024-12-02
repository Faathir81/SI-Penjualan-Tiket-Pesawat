<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-6 py-8">
                <h3 class="text-lg font-semibold mb-4">Search User by Email</h3>

                <!-- Form Pencarian -->
                <form method="GET" action="{{ route('team') }}" class="mb-6">
                    @csrf
                    <div class="flex items-center space-x-4">
                        <input type="text" name="email" id="email" placeholder="Enter email"
                            value="{{ request('email') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 shadow-sm">
                            Search
                        </button>
                    </div>
                    @if ($errors->has('email'))
                    <div class="text-red-500 mt-2">
                        {{ $errors->first('email') }}
                    </div>
                    @endif
                </form>

                <!-- Notifikasi jika email tidak ditemukan -->
                @if (request('email') && $users->isEmpty())
                <div class="mb-4 text-red-500">
                    No user found with the email "{{ request('email') }}".
                </div>
                @endif

                <!-- Tampilkan List User Jika Ada -->
                @if (!$users->isEmpty())
                <table class="min-w-full border-collapse border border-gray-200 bg-gray-50 shadow-md rounded-lg">
                    <thead>
                        <tr class="bg-indigo-500 text-white">
                            <th class="border border-gray-200 px-6 py-3 text-left">Name</th>
                            <th class="border border-gray-200 px-6 py-3 text-left">Email</th>
                            <th class="border border-gray-200 px-6 py-3 text-left">Current Role</th>
                            <th class="border border-gray-200 px-6 py-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr class="hover:bg-gray-100 transition ease-in-out duration-150">
                            <td class="border border-gray-200 px-6 py-3">{{ $user->name }}</td>
                            <td class="border border-gray-200 px-6 py-3">{{ $user->email }}</td>
                            <td class="border border-gray-200 px-6 py-3">
                                {{ $user->roles->pluck('name')->first() }}
                            </td>
                            <td class="border border-gray-200 px-6 py-3">
                                <form action="{{ route('team.update-role', $user->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('POST')
                                    <select name="role"
                                        class="border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        <option value="user" {{ $user->hasRole('user') ? 'selected' : '' }}>User
                                        </option>
                                        <option value="admin" {{ $user->hasRole('admin') ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="teamIT" {{ $user->hasRole('teamIT') ? 'selected' : '' }}>TeamIT
                                        </option>
                                    </select>
                                    <button type="submit"
                                        class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 shadow-sm">
                                        Update
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>