<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div>

                    <div class="p-6">
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                            {{ $post->title }}</h2>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $post->content }}</p>
                        <div class="mt-4">
                            <span
                                class="text-sm text-gray-600 dark:text-gray-400">{{ $post->created_at->format('d/m/Y H:i') }}</span>
                            <a href="{{ route('posts.edit', $post) }}"
                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <div><strong>Published Up Timezone : </strong> {{ $post->published_up->getTimezone() }}
                            </div>
                            <div><strong>User Timezone</strong> : {{ auth()->user()?->timezone }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
