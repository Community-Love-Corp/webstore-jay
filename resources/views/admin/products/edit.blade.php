<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Edit Product: {{ $product->title }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto">
        <form action="{{ route('admin.products.update', $product->slug) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                <input type="text" name="title"
                       value="{{ $product->title }}"
                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100"
                       required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Price</label>
                <input type="number" step="0.01" name="price"
                       value="{{ $product->price }}"
                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100"
                       required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Abstract (HTML allowed)</label>
                <textarea name="abstract_html" rows="10"
                          class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100">{{ $product->abstract_html }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Full Content (HTML allowed)</label>
                <textarea name="full_html" rows="20"
                          class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100">{{ $product->full_html }}</textarea>
            </div>

            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
                Update
            </button>
        </form>

        <div class="mt-8">
            <x-media-upload />
        </div>
    </div>
</x-app-layout>
