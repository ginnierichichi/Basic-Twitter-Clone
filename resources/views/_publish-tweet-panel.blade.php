
<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets">
        @csrf
        <textarea
            name="body"
            class="w-full"
            placeholder="What's up Doc?"
            required
        ></textarea>

        <hr class="my-4">
        <footer class="flex justify-between">
            <img src="{{ auth()->user()->avatar }}"
                 alt="Your Avatar"
                 class="rounded-full mr-2"
                 width="50">
            <button type="submit" class="bg-blue-300 hover:bg-blue-600 rounded-lg shadow px-8 text-sm text-white">Tweet it!</button>
        </footer>
    </form>

    @error('body')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>
