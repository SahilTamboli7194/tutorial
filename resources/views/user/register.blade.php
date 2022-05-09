<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-8 rounded-xl ">
            <h1 class="text-xl text-center font-bold ">
                Register
            </h1>
            <form action="/register" method="post" class="mt-10">
                    @csrf
                <div class="mb-6">
                    <label for="name" class="block uppercase font-bold text-xs text-gray-700 mb-2 ">
                        Name
                    </label>
                    <input type="text" name="name" id="name" placeholder="Name" value="{{old('name')}}" class="border border-gray-400 w-full p-2 rounded">
                    @error('name')
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="username" class="block uppercase font-bold text-xs text-gray-700 mb-2 ">
                        Username
                    </label>
                    <input type="text" name="username" id="username" placeholder="username" value="{{old('username')}}" class="border border-gray-400 w-full p-2 rounded">
                    @error('username')
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="block uppercase font-bold text-xs text-gray-700 mb-2 ">
                        email
                    </label>
                    <input type="email" name="email" id="email" placeholder="email" value="{{old('email')}}" class="border border-gray-400 w-full p-2 rounded">
                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block uppercase font-bold text-xs text-gray-700 mb-2 ">
                        password
                    </label>
                    <input type="password" name="password" id="password" placeholder="password"  class="border border-gray-400 w-full p-2 rounded">
                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded px-4 py-2 hover:bg-blue-500">
                        submit
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>