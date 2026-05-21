
@php
function render_placeholders($html) {
    if (!$html) return '';

    $html = preg_replace_callback('/\{\{IMAGE:(.*?)\}\}/', fn($m) =>
        '<img src="' . url('storage/pages/' . trim($m[1])) . '" class="auth-img">'
    , $html);

    $html = preg_replace_callback('/\{\{AUDIO:(.*?)\}\}/', fn($m) =>
        '<audio controls><source src="' . url('storage/audio/' . trim($m[1])) . '" type="audio/mpeg"></audio>'
    , $html);

    $html = preg_replace_callback('/\{\{VIDEO:(.*?)\}\}/', fn($m) =>
        '<video controls width="100%"><source src="' . url('storage/video/' . trim($m[1])) . '" type="video/mp4"></video>'
    , $html);

    $html = preg_replace_callback('/\{\{PDF:(.*?)\}\}/', fn($m) =>
        '<iframe src="' . url('storage/docs/' . trim($m[1])) . '" width="100%" height="600px"></iframe>'
    , $html);

    return $html;
}
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
@php
    $source = 'resilience';
    $comments = \App\Models\Comment::where('source_page', $source)
                                   ->orderBy('id', 'desc')
                                   ->get();
@endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }} 
                    <br><br>{{ __("Shop for world class Information Technology Research.") }} 
                    
                </div>
            </div>
        </div>
    </div>
      <div class="py-6">
        <table class="w-full border">
            <tr class="bg-gray-100">
                <th class="p-2 border">Price</th>
                <th class="p-2 border">Description</th>
            </tr>

            @foreach($products as $product)
            @php
                $hasPurchased = \App\Models\Order::where('user_id', auth()->id())
                    ->where('product_id', $product->id)
                    ->where('status', 'paid')
                    ->exists();
            @endphp

            <tr>
                <td class="p-2 border" width="30%">
                    <h3>{{ $product->title }}</h3>
                    <p>${{ $product->price }}</p>

                    @if($hasPurchased)
                        <p class="text-green-600 font-bold">Purchased</p>
                    @else
                        <form action="/checkout/paypal/{{ $product->slug }}" method="POST">
                            @csrf
                            <button class="bg-blue-600 text-white px-4 py-2">Buy Now</button>
                        </form>
                    @endif
                </td>

                <td class="p-2 border" width="70%">
                    {!! render_placeholders($product->abstract_html) !!}
                    
                    @if($hasPurchased)
                        <hr class="my-4">
                        {!! render_placeholders($product->full_html) !!}
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>

  	<div style="text-align: center;">
		<div class="auth-box-main">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Comments') }}
            </h2>
             <br><br>         {{-- Shared Comment Component --}}
            <x-comments :source="$source" :comments="$comments" />
		</div>
	</div>    
    
         <p style="text-align: justify;">
            <strong>© 2026 ARRJ Harmony New Zealand. This work is original. Do not copy, repost, or use without permission.</strong>
            See <a href="https://www.blog.systematicdefence.tech/license.html">Legal license</a>.
        </p>
</x-app-layout>
