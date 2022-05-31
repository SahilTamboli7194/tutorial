<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://unpkg.com/alpinejs" defer></script>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex item-center text-sm">

                    @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                        <button 
                     
                             class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-52 text-left flex lg:inline-flex font-bold uppercase"> 
                             
                             welcome {{auth()->user()->username}} !
                         </button>
                        </x-slot>
                            
                            @can('admin')                               
                           
                             <a href="/admin/post/all" class="block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white {{request()->is('/admin/post/all')? 'bg-blue-500':''}}">
                                All Post
                             </a>
                             <a href="/admin/post/create" class="block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white {{request()->is('/admin/post/create')? 'bg-blue-500':''}}">
                                New Post
                             </a>
                             @endcan    
                             <a href="#" class="block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white"
                                x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()"
                             >
                           
                                logout
                             </a>
                             <form action="/logout" method="POST" class="hidden" id="logout-form"> 
                                @csrf 
                               
                            </form>
                    </x-dropdown>
                    
                    
                   @else
                   <a href="/register" class="text-xs font-bold uppercase">register</a>
                   |
                   <a href="/login" class="text-xs font-bold uppercase">login</a>
                @endauth
    
               
                

                <a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>
            {{$slot}}
        <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" name="email" type="text" placeholder="Your email address"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>

                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                        
                    </form>
                   
                </div>
                @error('email')
                <p class="font-semibold text-sm text-red-600 mt-2">
                    {{$message}}
                </p>
                @enderror
            </div>
        </footer>
    </section>
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
</body>