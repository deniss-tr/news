@extends('layouts.app')

@section('title', 'List')


@section('content')

    <main class="container">


        <div class="source">
            <a href="{{ $source->link }}">
                <img class="source__logo" src="{{ $source->image->url }}">           
            </a>
            <div class="source__title">{{ $source->description }}</div>
        </div>

        
        @foreach($data as $item)
       

        <article>       
            <div>
                <a href="{{ $item->link }}">
                    <img class="image" src="{{ $item->enclosure['url'] }}" alt="article image">
                </a>
            </div>
            <div class="article-data">
                <div class="article-header">
                    <div class="article-header__left">

                    @foreach($item->category as $link)
                        <a href="{{ $link['domain'] }}">{{ $link }}</a>
                        <span> / </span>
                    @endforeach

                    </div>
                    <div class="article-header__right">
                        <div class="date-time">{{ date('Y-m-d H:i:s', strtotime($item->pubDate)) }}</div>
                    </div>
                </div>
            
                <a class="article-title" href="{{ $item->link }}">
                    {{ $item->title }}
                </a>

                <a class="article-description" href="{{ $item->link }}">
                    {{ $item->description }}
                </a>
            </div>
        </article>

        @endforeach
        {{ $data->links() }}
        
    </main>
    
@endsection