<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Products</h2>
    </x-slot>

    <div class="py-6">
        <a href="{{ route('admin.products.create') }}" class="text-blue-600 underline">Create New Product</a>

        <table class="mt-4 w-full border">
            <tr class="bg-gray-100">
                <th class="p-2 border">Title</th>
                <th class="p-2 border">Slug</th>
                <th class="p-2 border">Price</th>
                <th class="p-2 border">Actions</th>
            </tr>

            @foreach($products as $product)
            <tr>
                <td class="p-2 border">{{ $product->title }}</td>
                <td class="p-2 border">{{ $product->slug }}</td>
                <td class="p-2 border">${{ $product->price }}</td>
                <td class="p-2 border">
                    <a href="{{ route('admin.products.edit', $product->slug) }}" class="text-blue-600 underline">Edit</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>