<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <x-admin.setting hedding="All Posts">
        <main class="max-w-3xl mx-auto  border border-gray-200  rounded-xl ">
            <div class="container mx-auto sm:px-8">
                  <div class="-mx-4 sm:-mx-8 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                      <table class="min-w-full leading-normal border-t border-gray-200 shadow-md">
                       
                        <tbody>
                        @foreach ($posts as $post)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex">
                                        
                                        <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            <a href="/post/{{$post->slug}}">
                                                {{$post->slug}}
                                            </a>
                                        
                                        </p>
                                        
                                        </div>
                                    </div>
                                    </td>
                                    
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Published</span>
                                    </span>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right">
                                        <a href="/admin/post/{{$post->id}}/edit" class="text-blue-500 hover:text-blue-600"> edit</a> 
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right">
                                        {{-- <a href="/admin/post/{{$post->id}}/edit" class="text-blue-500 hover:text-blue-600"> edit</a>  --}}
                                        <form action="/admin/post/{{$post->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-gray-400 hover:text-gray-700"> Delete</button>
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
              </div>
        </main>
        </x-admin.setting>
    </main>
</x-layout>