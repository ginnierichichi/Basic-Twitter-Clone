<div class="flex p-4 {{ $loop->last ? '' : 'border-b border-b-gray-400' }}">
    <div class="mr-2 flex-shrink-0">
       <a href="{{ route('profile', $tweet->user) }}">
            <img src="{{ $tweet->user->avatar }}"
                 alt=""
                 width="60"
                 class="rounded-full mr-2">
       </a>
    </div>


    <div>
        <h5 class="font-bold mb-4">
            <a href="{{ route('profile', $tweet->user) }}">
                {{ $tweet->user->name }}
            </a>
        </h5>
        <p class="text-sm mb-3">{{ $tweet->body }}</p>
         <x-like-buttons :tweet="$tweet" />
    </div>

    <footer>
        <form method="POST" action="/tweets/{{ $tweet->id }}" class="text-right">
            @csrf
            @method('DELETE')

            <div class="ml-5 border border-dark">
                <button type="submit" class="text-xs">Delete</button>
            </div>
        </form>

    </footer>
</div>
