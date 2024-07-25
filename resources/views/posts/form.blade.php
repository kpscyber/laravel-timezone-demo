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
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="{{ $post->title ?? '' }}" class="w-full p-2 border border-gray-300 rounded mb-3">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" class="w-full p-2 border border-gray-300 rounded mb-3">{{ $post->content ?? '' }}</textarea>
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        <label for="published_up">Published Up</label>
                        <input type="datetime-local" name="published_up" id="published_up" value="{{ $post?->published_up?->format('Y-m-d\TH:i') ?? '' }}" class="w-full p-2 border border-gray-300 rounded mb-3">
                        
                        <x-button>Save</x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>