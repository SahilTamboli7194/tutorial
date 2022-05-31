@props(['hedding'])
<section class="py-8 px-4 max-w-4xl max-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{$hedding}}
    </h1>
    <div class="flex">
        <aside class="w-48">
             <h4 class="font-semibold mb-4">
                 Links
             </h4>
             <ul>
                <li>
                    <a href="/admin/post/all" class="{{ request()->is('admin/post/all') ? 'text-blue-500':''}} mb-3">
                     All Post
                    </a>
                </li>
                 <li>
                     <a href="/admin/post/create" class="{{ request()->is('admin/post/create') ? 'text-blue-500':''}} mb-3">
                       New Post
                     </a>
                 </li>
             </ul>
        </aside>
        <main class="flex-1">
            {{$slot}}
        </main>
    </div>
    
    
</section>