@props(['comment'])
<article class="flex bg-gray-100 border bord$er-gray-200 p-6 rounded-xl space-x-4">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/60?u={{$comment->id}}" alt="" height="60px" width="60px" class="rounded-xl">
    </div>
    <div class="mb-4">
        <header>
        <h3 class="font-bold">
            {{$comment->user->username}}
        </h3>
            <p class="text-xs mt-1">
                Posted 
                <time>
                   {{$comment->created_at->diffForHumans()}}
                </time>
            </p>
            <p class="mt-2">
                {{$comment->body}}
            </p>
        </header>
    </div>
</article>