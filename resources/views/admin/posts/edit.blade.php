@extends('layouts.admin')

@section('title', 'Edit Post')

@section('content')
<style>
    .form-container {
        background: white;
        border: 1px solid #dee2e6;
        border-radius: 6px;
        overflow: hidden;
    }
    .form-header {
        padding: 15px 20px;
        border-bottom: 1px solid #dee2e6;
        background: #f8f9fa;
    }
    .form-header h4 {
        color: #2c3e50;
        font-size: 1.125rem;
        font-weight: 600;
        margin: 0;
    }
    .form-body {
        padding: 20px;
    }
    .form-label {
        color: #2c3e50;
        font-weight: 500;
        font-size: 0.875rem;
        margin-bottom: 6px;
    }
    .form-control {
        border: 1px solid #dee2e6;
        border-radius: 4px;
        padding: 8px 12px;
        font-size: 0.875rem;
    }
    .form-control:focus {
        border-color: #2c3e50;
        box-shadow: 0 0 0 0.2rem rgba(44, 62, 80, 0.25);
    }
    .btn-primary {
        background: #2c3e50;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        font-size: 0.875rem;
        font-weight: 500;
    }
    .btn-primary:hover {
        background: #1a252f;
    }
    .btn-secondary {
        background: #6c757d;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        font-size: 0.875rem;
        font-weight: 500;
    }
    .btn-secondary:hover {
        background: #5a6268;
    }
</style>

<div class="form-container">
    <div class="form-header">
        <h4><i class="fas fa-edit"></i> Edit Post</h4>
    </div>
    <div class="form-body">
        <form action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                       id="title" name="title" value="{{ old('title', $post->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control @error('author') is-invalid @enderror" 
                       id="author" name="author" value="{{ old('author', $post->author) }}" required>
                @error('author')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" 
                          id="content" name="content" rows="10" required>{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="published" name="published" value="1" 
                       {{ old('published', $post->published) ? 'checked' : '' }}>
                <label class="form-check-label" for="published" style="font-size: 0.875rem;">
                    Publish immediately
                </label>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Post
                </button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<!-- CKEditor Script -->
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content', {
        height: 400,
        removeButtons: 'Source'
    });
</script>
@endsection
