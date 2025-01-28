<x-guest-layout>
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6 text-center">Log In</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                <input id="email" class="block mt-1 w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-md text-gray-200 focus:ring-blue-500 focus:border-blue-500" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                <input id="password" class="block mt-1 w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-md text-gray-200 focus:ring-blue-500 focus:border-blue-500" type="password" name="password" required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="mb-4 flex items-center">
                <input id="remember_me" type="checkbox" class="text-blue-500 focus:ring-blue-500 border-gray-300 rounded" name="remember">
                <label for="remember_me" class="ml-2 text-sm text-gray-300">Remember me</label>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-500">Log in</button>
            </div>
        </form>
    </div>
</x-guest-layout>
