<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Give us your feedback
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (Auth::user()->role === 'User')
                <!-- Success message after submission -->
                @if(session('success'))
                    <div style="background-color: #dcfce7; color: black; padding: 1rem; margin-bottom: 1rem; border-radius: 0.25rem;">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form action="{{ route('feedback.store') }}" method="POST" class="p-6">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" readonly class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div class="mb-4">
                            <label for="feedback" class="block text-sm font-medium text-gray-700">Feedback</label>
                            <textarea id="feedback" name="feedback" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                        </div>

                        <div class="mt-6">
                            <!-- Submit button -->
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            @else
                <p class="text-center text-gray-600">Only users can submit feedback.</p>
            @endif
        </div>
    </div>
</x-app-layout>
