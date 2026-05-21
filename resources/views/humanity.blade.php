
@php
    $source = 'humanity';
    $comments = \App\Models\Comment::where('source_page', $source)
                                   ->orderBy('id', 'desc')
                                   ->get();
@endphp

<x-comments :source="$source" :comments="$comments" />
