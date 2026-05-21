<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit Product: {{ $product->title }}</h2>
    </x-slot>

    <div class="py-6">
        <form action="{{ route('admin.products.update', $product->slug) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Title</label>
            <input type="text" name="title" value="{{ $product->title }}" class="w-full border p-2" required>

            <label class="mt-4 block">Price</label>
            <input type="number" step="0.01" name="price" value="{{ $product->price }}" class="w-full border p-2" required>

            <label class="mt-4 block">Abstract (HTML allowed)</label>
            <textarea name="abstract_html" rows="10" class="w-full border p-2">{{ $product->abstract_html }}</textarea>

            <label class="mt-4 block">Full Content (HTML allowed)</label>
            <textarea name="full_html" rows="20" class="w-full border p-2">{{ $product->full_html }}</textarea>

            <button class="mt-4 bg-blue-600 text-white px-4 py-2">Update</button>
        </form>
        <x-media-upload />
    </div>
</x-app-layout>