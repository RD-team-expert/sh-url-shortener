<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users List') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-center">
            <div class="w-full lg:w-3/4 xl:w-2/3">

                        <div class="overflow-x-auto">
                            <table class="w-full bg-white border border-gray-300 rounded-lg shadow-md">
                                <thead>
                                    <tr class="bg-gray-50 text-left text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-4 sm:px-6">Name</th>
                                        <th class="py-3 px-4 sm:px-6">Email</th>
                                        <th class="py-3 px-4 sm:px-6">Password</th>
                                        <th class="py-3 px-4 sm:px-6">Role</th>
                                        <th class="py-3 px-4 sm:px-6 text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light" x-data="{ openDropdown: null }">
                                    @foreach ($users as $user)
                                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                                            <td class="py-3 px-4 sm:px-6">{{ $user->name }}</td>
                                            <td class="py-3 px-4 sm:px-6">{{ $user->email }}</td>
                                            <td class="py-3 px-4 sm:px-6">
                                                **********
                                            </td>
                                            <td class="py-3 px-4 sm:px-6">{{ $user->role }}</td>
                                            <td class="py-3 px-4 sm:px-6 text-right">
                                                <div class="relative inline-block text-left">
                                                    <!-- Dropdown Trigger -->
                                                    <div>
                                                        <svg @click="openDropdown === {{ $user->id }} ? openDropdown = null : openDropdown = {{ $user->id }}"
                                                            class="h-6 w-6 cursor-pointer text-gray-700 hover:text-gray-900"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>

                                                    <!-- Dropdown Menu -->
                                                    <div x-show="openDropdown === {{ $user->id }}"
                                                        @click.away="openDropdown = null"
                                                        class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                                                        <div class="py-1">
                                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit</a>
                                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>

