<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <x-admin.setting hedding="new post">
        <main class="max-w-3xl mx-auto  border border-gray-200 p-8 rounded-xl ">
            <form action="/admin/post" method="post" enctype="multipart/form-data" >
                @csrf
            <div class="mb-6">
                <label for="title" class="block uppercase font-bold text-xs text-gray-700 mb-2 ">
                    Title
                </label>
                <input type="text" name="title" id="title" placeholder="Title" value="{{old('title')}}" class="border border-gray-400 w-full p-2 rounded">
                @error('title')
                    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="thumbnail" class="block uppercase font-bold text-xs text-gray-700 mb-2 ">
                    Thumbnail
                </label>
                <input type="file" name="thumbnail" id="thumbnail" placeholder="thumbnail" value="{{old('thumbnail')}}" class="border border-gray-400 w-full p-2 rounded">
                @error('thumbnail')
                    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="slug" class="block uppercase font-bold text-xs text-gray-700 mb-2 ">
                    Slug
                </label>
                <input type="text" name="slug" id="slug" placeholder="Slug" value="{{old('slug')}}" class="border border-gray-400 w-full p-2 rounded">
                @error('slug')
                    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="excerpt" class="block uppercase font-bold text-xs text-gray-700 mb-2 ">
                    Excerpt
                </label>
                <input type="text" name="excerpt" id="excerpt" placeholder="Excerpt" value="{{old('excerpt')}}"  class="border border-gray-400 w-full p-2 rounded">
                @error('excerpt')
                    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="body" class="block uppercase font-bold text-xs text-gray-700 mb-2 ">
                    Body
                </label>
                <textarea name="body" id="body" placeholder="Body" cols="30" rows="6" value="{{old('body')}}" class="border border-gray-400 w-full p-2 rounded"></textarea>
                @error('body')
                    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>
           
            <div class="mb-6">
                <label for="category_id" class="block uppercase font-bold text-xs text-gray-700 mb-2 ">
                    Select Category
                </label>
               <select name="category_id" id="category_id" class="border border-gray-400 w-full p-2 rounded">
                    <option value="444" >S44</option>
                    @foreach (App\Models\Category::all() as $category)
                        <option value="{{$category->id}}" {{old('category_id')==$category->id?'selected':''}}>{{ucwords($category->name)}}</option>
                    @endforeach
               </select>
                @error('category_id')
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
        </x-admin.setting>
    </main>
</x-layout>