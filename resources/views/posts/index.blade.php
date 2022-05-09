<x-layout>
@include('posts._header');

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">        
         @if($posts->count())
         <x-post-featured-card :post="$posts[0]"/>
        @if($posts->count() > 1)
         <div class="lg:grid lg:grid-cols-6">
            @foreach($posts->skip(1) as $post)
            
                 <x-post-card 
                    :post="$post"
                    class="{{$loop->iteration < 3 ? 'col-span-3' : 'col-span-2'}}"
                  />
              
            @endforeach    
         
         </div>
         {{$posts->links()}}
         @endif

        @else 
            <p class="text-center">
                No post yet .. Please check back later 
            </p>
        @endif
    </main>
  @if(session()->has('success'))
  <div x-data="{show:true}"
       x-init="setTimeout(()=> show=false,7000)"
       x-show="show"
       class="fixed bg-blue-500 text-white px-4 py-2 rounded-xl bottom-10 right-3 text-sm" >
     <p>
        {{session('success')}}
      </p>
  </div>

  
  @endif
</x-layout>

