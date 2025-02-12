<x-app-layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-2xl bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">Edit User</h2>

            <form method="POST" action="{{ route('users.update', $user->id) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div>
                    <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

             <!-- Password (Optional) -->
<div class="mt-4">
    <label for="password" class="block font-medium text-sm text-gray-700">
        New Password <span class="text-gray-500 text-xs">(Leave blank to keep current password)</span>
    </label>
    <input type="password" name="password" id="password"
        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
</div>


                <!-- Role -->
                <div>
                    <label for="role" class="block font-medium text-sm text-gray-700">Role</label>
                    <select name="role" id="role"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="User" {{ $user->role == 'User' ? 'selected' : '' }}>User</option>
                    </select>
                </div>

                <button type="submit"
                class="bg-gray-900 hover:bg-gray-950 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-200">
                Update User
        </button>

                </div>
            </form>
        </div>
    </div>
</x-app-layout>
