@extends('layouts.app')

@section('title', $settings->blog_name)
@section('meta_description', $settings->blog_description)
@section('meta_keywords', $settings->blog_keywords)
@section('meta_author', $settings->blog_author)

@section('content')

<div class="content-wrapper">
@include('layouts.nav')
<div class="container py-5" style="padding-top: 60px; max-width: 900px;">
    <div class="row">
        <div class="col-12">
            <article>
                <div class="article-header">
                    <h1 class="article-title">{{ $post->title }}</h1>
                    <div class="article-meta">
                        <i class="fas fa-user"></i> {{ $post->user->name }} | 
                        <i class="far fa-calendar"></i> {{ $post->created_at->format('F d, Y') }}
                    </div>
                </div>
                
                <div class="article-content">
                    {!! $post->content !!}
                </div>
                
                <a href="{{ route('blog.index') }}" class="back-button" aria-label="Go back to blog posts">
                    <i class="fas fa-arrow-left" aria-hidden="true"></i> Back to Posts
                </a>
            </article>
        </div>
    </div>
</div>
</div>

@include('layouts.footer')
@include('layouts.search')


@endsection
