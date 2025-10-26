@extends('layouts.app')

@section('title', 'Blog')
@section('meta_description', 'Read our latest blog posts on web development, programming, and technology. Stay updated with tutorials, tips, and best practices.')

@section('content')
<style>
   
</style>

<div class="content-wrapper">
@include('layouts.nav')
<div class="container py-3" style="padding-top: 60px; max-width: 900px;">
    @if($posts->count() > 0)
        <div class="row">
            <div class="col-12">
                @foreach($posts as $post)
                    <article class="article-item">
                        <h2 class="article-title">
                            <a href="{{ route('blog.show', $post->slug) }}" aria-label="Read full article: {{ $post->title }}">{{ $post->title }}</a>
                        </h2>
                        
                        <div class="article-meta">
                            <i class="fas fa-user"></i> {{ $post->user->name }} | 
                            <i class="far fa-calendar"></i> {{ $post->created_at->format('M d, Y') }}
                        </div>
                        
                        <div class="article-content">
                            {!! Str::limit(strip_tags($post->content), 200) !!}
                        </div>
                        
                        <a href="{{ route('blog.show', $post->slug) }}" class="read-more" aria-label="Read more about {{ $post->title }}">
                            Continue reading {{ $post->title }} <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
        
        <!-- Pagination -->
        @if($posts->hasPages())
        <div class="row mt-4">
            <div class="col-12">
                {{ $posts->links('vendor.pagination.default') }}
            </div>
        </div>
        @endif
    @else
        <div class="container">
            <div class="text-center py-5">
                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">No posts available yet</h4>
                <p class="text-muted">Check back later for new articles!</p>
            </div>
        </div>
    @endif
</div>
</div>

@include('layouts.footer')
@include('layouts.search')

<!-- Scroll to Top Button -->
<button id="scrollToTop" class="scroll-to-top" aria-label="Scroll to top">
    <i class="fas fa-rocket"></i>
</button>

@endsection
