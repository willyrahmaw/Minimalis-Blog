@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<style>
    a {
        text-decoration: none;
    }
    .stat-card {
        border: 1px solid #dee2e6;
        border-radius: 6px;
        padding: 20px;
        background: white;
        transition: all 0.2s ease;
    }
    .stat-card:hover {
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .stat-card .icon {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }
    .stat-card h2 {
        font-size: 2rem;
        font-weight: 600;
        margin: 8px 0 4px 0;
    }
    .stat-card p {
        color: #6c757d;
        font-size: 0.875rem;
        margin: 0;
    }
    .posts-table {
        background: white;
        border-radius: 6px;
        border: 1px solid #dee2e6;
        overflow: hidden;
    }
    .posts-table .table-header {
        padding: 15px 20px;
        border-bottom: 1px solid #dee2e6;
        background: #f8f9fa;
    }
    .posts-table table {
        margin: 0;
    }
    .posts-table th {
        font-weight: 500;
        color: #2c3e50;
        padding: 12px 20px;
        border: none;
        background: #f8f9fa;
        font-size: 0.875rem;
    }
    .posts-table td {
        padding: 15px 20px;
        vertical-align: middle;
        border-bottom: 1px solid #f1f3f4;
        font-size: 0.875rem;
    }
    .posts-table tbody tr:last-child td {
        border-bottom: none;
    }
    .posts-table tbody tr:hover {
        background: #f8f9fa;
    }
    .badge-status {
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 500;
    }
    .badge-published {
        background: #d1e7dd;
        color: #0f5132;
    }
    .badge-draft {
        background: #fff3cd;
        color: #664d03;
    }
    .btn-action {
        padding: 4px 8px;
        border-radius: 4px;
        margin: 0 1px;
        font-size: 0.75rem;
    }
    .btn-create {
        background: #2c3e50;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        color: white;
        font-weight: 500;
        font-size: 0.875rem;
        transition: all 0.2s;
    }
    .btn-create:hover {
        background: #1a252f;
        color: white;
    }
    .table-header h5 {
        color: #2c3e50;
        font-size: 1rem;
        font-weight: 600;
    }
    .pagination-wrapper {
        padding: 15px 20px;
        background: #f8f9fa;
        border-top: 1px solid #dee2e6;
    }
    .pagination {
        margin: 0;
        justify-content: center;
    }
    .pagination .page-link {
        color: #2c3e50;
        border: 1px solid #dee2e6;
        padding: 8px 12px;
        font-size: 0.875rem;
    }
    .pagination .page-link:hover {
        background: #2c3e50;
        color: white;
        border-color: #2c3e50;
    }
    .pagination .page-item.active .page-link {
        color: white;
        background: #2c3e50;
        border-color: #2c3e50;
    }
</style>

<div class="mb-4">
    <div class="row g-4">
        <div class="col-md-3">
            <div class="stat-card">
                <div class="icon text-primary"><i class="fas fa-file-alt"></i></div>
                <h2 class="text-primary">{{ $allPosts->count() }}</h2>
                <p>Total Posts</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="icon text-success"><i class="fas fa-check-circle"></i></div>
                <h2 class="text-success">{{ $allPosts->where('published', true)->count() }}</h2>
                <p>Published</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="icon text-warning"><i class="fas fa-clock"></i></div>
                <h2 class="text-warning">{{ $allPosts->where('published', false)->count() }}</h2>
                <p>Draft</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="icon text-info"><i class="fas fa-eye"></i></div>
                <h2 class="text-info">{{ $allPosts->sum('views') }}</h2>
                <p>Total Views</p>
            </div>
        </div>
    </div>
</div>

<div class="posts-table">
    <div class="table-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-semibold">All Posts</h5>
        <a href="{{ route('posts.create') }}" class="btn-create">
            <i class="fas fa-plus me-2"></i>Create Post
        </a>
    </div>
    @if($posts->count() > 0)
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th width="40%">Title</th>
                    <th width="15%">Status</th>
                    <th width="15%">Views</th>
                    <th width="15%">Created</th>
                    <th width="15%" class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>
                        <strong>{{ $post->title }}</strong><br>
                        <small class="text-muted">by {{ $post->author }}</small>
                    </td>
                    <td>
                        @if($post->published)
                            <span class="badge-status badge-published">Published</span>
                        @else
                            <span class="badge-status badge-draft">Draft</span>
                        @endif
                    </td>
                    <td>
                        <span class="text-muted">
                            <i class="fas fa-eye me-1"></i>{{ number_format($post->views) }}
                        </span>
                    </td>
                    <td class="text-muted">{{ $post->created_at->format('M d, Y') }}</td>
                    <td class="text-end">
                        @if($post->published)
                        <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-sm btn-action btn-outline-info" target="_blank" title="View">
                            <i class="fas fa-eye"></i>
                        </a>
                        @endif
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-action btn-outline-warning" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-action btn-outline-danger" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    @if($posts->hasPages())
    <div class="pagination-wrapper">
    {{ $posts->links('vendor.pagination.default') }}
    </div>
    @endif
    @else
    <div class="text-center py-5">
        <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
        <p class="text-muted mb-4">No posts yet. Create your first post!</p>
        <a href="{{ route('posts.create') }}" class="btn-create">
            <i class="fas fa-plus me-2"></i>Create Your First Post
        </a>
    </div>
    @endif
</div>
@endsection
