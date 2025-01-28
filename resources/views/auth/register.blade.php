<x-guest-layout>
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6 text-center">Register</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-300">Name</label>
                <input id="name" class="block mt-1 w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-md text-gray-200 focus:ring-green-500 focus:border-green-500" type="text" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                <input id="email" class="block mt-1 w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-md text-gray-200 focus:ring-green-500 focus:border-green-500" type="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                <input id="password" class="block mt-1 w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-md text-gray-200 focus:ring-green-500 focus:border-green-500" type="password" name="password" required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-300">Confirm Password</label>
                <input id="password_confirmation" class="block mt-1 w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-md text-gray-200 focus:ring-green-500 focus:border-green-500" type="password" name="password_confirmation" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-500">Register</button>
            </div>
        </form>
    </div>
</x-guest-layout>
