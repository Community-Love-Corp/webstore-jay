@extends('layouts.cms')

@section('content')

@php
    $content = $page->content;

    // Build number
    $build = trim(file_get_contents(base_path('build_number.txt')));
    $content = str_replace('{{BUILD_NUMBER}}', $build, $content);

    // Images
    $content = preg_replace_callback('/\{\{IMAGE:(.*?)\}\}/', function ($m) {
        return '<img src="' . url('storage/pages/' . trim($m[1])) . '" class="auth-img">';
    }, $content);

    // Audio
    $content = preg_replace_callback('/\{\{AUDIO:(.*?)\}\}/', function ($m) {
        return '<audio controls><source src="' . url('storage/audio/' . trim($m[1])) . '" type="audio/mpeg"></audio>';
    }, $content);

    // Video
    $content = preg_replace_callback('/\{\{VIDEO:(.*?)\}\}/', function ($m) {
        return '<video controls width="100%"><source src="' . url('storage/video/' . trim($m[1])) . '" type="video/mp4"></video>';
    }, $content);

    // PDF
    $content = preg_replace_callback('/\{\{PDF:(.*?)\}\}/', function ($m) {
        return '<iframe src="' . url('storage/docs/' . trim($m[1])) . '" width="100%" height="600px"></iframe>';
    }, $content);
@endphp

{!! $content !!}

{{-- Comments --}}
<x-comments :source="$page->slug" :comments="$comments" />




@endsection
