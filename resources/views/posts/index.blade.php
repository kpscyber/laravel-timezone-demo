<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2 m-2">
                    <div class="p-6 bg-slate-100 rounded-3xl flex justify-end">
                        <input type="text" class="w-1/3 p-2 border border-gray-300 rounded" placeholder="Search...">
                        <a role="button" href="{{ route('posts.create') }}" class="text-indigo-600 hover:text-indigo-900 mx-2">Create new post</a>
                    </div>
                    @forelse($posts as $post)
                        <div class="p-6 bg-slate-100 rounded-3xl mt-3">
                            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">{{ $post->title }}</h2>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $post->content }}</p>
                            <div class="mt-4">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Published Up: {{ $post->created_at->format('d/m/Y H:i') }}</span>
                                <a href="{{ route('posts.show', $post) }}" class="text-indigo-600 hover:text-indigo-900">Read more</a>
                                <div><strong>Published Up Timezone : </strong> {{ $post->published_up->getTimezone() }}</div>
                                <div><strong>User Timezone</strong> : {{ auth()->user()?->timezone }}</div>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('posts.edit', $post) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="p-6">
                            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">No posts found</h2>
                        </div>
                    @endforelse
                    @if(count($posts))
                        <div class="p-6 mt-3 bg-slate-100 rounded-3xl">
                            {{ $posts->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
