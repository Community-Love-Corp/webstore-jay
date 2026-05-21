<!--  <h1>Test Product</h1>
<p>Price: $49.99 NZD</p>

<a href="/checkout/paypal">
    <button style="padding:10px 20px; background:#0070ba; color:white; border:none;">
        Buy Now with PayPal
    </button>
</a>-->

@php
    // Process abstract
    $abstract = $product->abstract_html;

    $abstract = preg_replace_callback('/\{\{IMAGE:(.*?)\}\}/', fn($m) =>
        '<img src="' . url('storage/pages/' . trim($m[1])) . '" class="auth-img">'
    , $abstract);

    $abstract = preg_replace_callback('/\{\{AUDIO:(.*?)\}\}/', fn($m) =>
        '<audio controls><source src="' . url('storage/audio/' . trim($m[1])) . '" type="audio/mpeg"></audio>'
    , $abstract);

    $abstract = preg_replace_callback('/\{\{VIDEO:(.*?)\}\}/', fn($m) =>
        '<video controls width="100%"><source src="' . url('storage/video/' . trim($m[1])) . '" type="video/mp4"></video>'
    , $abstract);

    $abstract = preg_replace_callback('/\{\{PDF:(.*?)\}\}/', fn($m) =>
        '<iframe src="' . url('storage/docs/' . trim($m[1])) . '" width="100%" height="600px"></iframe>'
    , $abstract);

    // Process full content
    $content = $product->full_html;

    $content = preg_replace_callback('/\{\{IMAGE:(.*?)\}\}/', fn($m) =>
        '<img src="' . url('storage/pages/' . trim($m[1])) . '" class="auth-img">'
    , $content);

    $content = preg_replace_callback('/\{\{AUDIO:(.*?)\}\}/', fn($m) =>
        '<audio controls><source src="' . url('storage/audio/' . trim($m[1])) . '" type="audio/mpeg"></audio>'
    , $content);

    $content = preg_replace_callback('/\{\{VIDEO:(.*?)\}\}/', fn($m) =>
        '<video controls width="100%"><source src="' . url('storage/video/' . trim($m[1])) . '" type="video/mp4"></video>'
    , $content);

    $content = preg_replace_callback('/\{\{PDF:(.*?)\}\}/', fn($m) =>
        '<iframe src="' . url('storage/docs/' . trim($m[1])) . '" width="100%" height="600px"></iframe>'
    , $content);
@endphp

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            {{ $product->title }}
        </h2>
    </x-slot>

    <div class="py-6">

        {{-- ABSTRACT --}}
        @if($abstract)
            <div class="mb-6">
                {!! $abstract !!}
            </div>
        @endif

        {{-- FULL CONTENT --}}
        {!! $content !!}
    </div>

</x-app-layout>
