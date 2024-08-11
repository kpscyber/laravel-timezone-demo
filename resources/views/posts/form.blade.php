<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-3 mx-5 my-10">
                    <form action="{{ isset($post->id) ? route('posts.update', $post) : route('posts.store') }}" method="POST">
                        @csrf
                        @if(isset($post->id))
                            @method('PUT')
                        @endif
                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="w-full p-2 border border-gray-300 rounded mb-3">
                        </div>
                        <div class="mb-3">
                            <label for="content">Content</label>
                            <textarea name="content" id="content" rows="5" class="w-full p-2 border border-gray-300 rounded mb-3">{{ old('content', $post->content) }}</textarea>
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        </div>
                        <div class="mb-3">
                            <label for="published_up">Published Up  (<span class="text-blue-300">{{ $post->published_up ? $post->published_up->getTimezone() : '' }})</span></label>
                            <input type="datetime-local" name="published_up" id="published_up" value="{{ old('published_up', $post->published_up) }}" class="w-full p-2 border border-gray-300 rounded mb-3">
                        </div>
                        <div class="mb-3">
                            <label for="published_up">Published Down (<span class="text-blue-300">{{ $post->published_down ? $post->published_down->getTimezone() : '' }}</span>)</label>
                            <input type="datetime-local" name="published_down" id="published_down" value="{{ old('published_down', $post->published_down) }}" class="w-full p-2 border border-gray-300 rounded mb-3">
                        </div>
                        <div class="mb-3">
                            <x-button>
                                <a role="button" href="{{ route('posts.index') }}" class="text-slate-200 hover:text-indigo-300">Cancel</a>
                            </x-button>
                            <x-button>Save</x-button>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>