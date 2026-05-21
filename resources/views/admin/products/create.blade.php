<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Create Product</h2>
    </x-slot>

    <div class="py-6">
        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf

            <label>Slug</label>
            <input type="text" name="slug" class="w-full border p-2"  value="{{ old('slug') }}" required>

            <label class="mt-4 block">Title</label>
            <input type="text" name="title" class="w-full border p-2"  value="{{ old('title') }}" required>

            <label class="mt-4 block">Price</label>
            <input type="number" step="0.01" name="price" class="w-full border p-2"  value="{{ old('price') }}" required>

            <label class="mt-4 block">Abstract (HTML allowed)</label>
            <textarea name="abstract_html" rows="20" class="w-full border p-2">{{ old('abstract_html') }}</textarea>

            <label class="mt-4 block">Full Content (HTML allowed)</label>
            <textarea name="full_html" rows="20" class="w-full border p-2">{{ old('full_html') }}</textarea>

            <button class="mt-4 bg-blue-600 text-white px-4 py-2">Create</button>
        </form>

        <x-media-upload />
    </div>
</x-app-layout>
