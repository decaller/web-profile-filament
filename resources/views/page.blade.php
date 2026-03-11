@extends('layouts.app')

@section('title', $page->title)

@section('content')
    @if(is_array($page->content) && count($page->content) > 0)
        @foreach ($page->content as $block)
            @if (view()->exists('blocks.' . $block['type']))
                @include('blocks.' . $block['type'], ['data' => $block['data']])
            @else
                <div class="py-8 text-center text-red-500">
                    Block <strong>{{ $block['type'] }}</strong> not found.
                </div>
            @endif
        @endforeach
    @else
        <div class="py-20 text-center text-slate-500">
            This page has no content yet.
        </div>
    @endif
@endsection