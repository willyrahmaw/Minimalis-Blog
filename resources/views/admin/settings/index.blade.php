@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
<style>
    .settings-card {
        background: white;
        border-radius: 12px;
        border: 1px solid #e0e0e0;
        padding: 30px;
    }
    .settings-section {
        margin-bottom: 30px;
        padding-bottom: 30px;
        border-bottom: 1px solid #f0f0f0;
    }
    .settings-section:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }
    .settings-section h5 {
        color: #333;
        font-weight: 600;
        margin-bottom: 10px;
    }
    .settings-section p {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 20px;
    }
    .form-label {
        font-weight: 500;
        color: #333;
        margin-bottom: 8px;
    }
    .form-control {
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 10px 15px;
    }
    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.1);
    }
    .btn-save {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        padding: 12px 30px;
        border-radius: 8px;
        color: white;
        font-weight: 500;
        transition: all 0.3s;
    }
    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
    }
</style>

<div class="settings-card">
    <h3 class="mb-4">Blog Settings</h3>
    
    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        
        <div class="settings-section">
            <h5><i class="fas fa-blog me-2"></i>General Settings</h5>
            <p>Configure your blog's basic information</p>
            
            <div class="mb-3">
                <label for="blog_name" class="form-label">Blog Name *</label>
                <input type="text" class="form-control @error('blog_name') is-invalid @enderror" 
                       id="blog_name" name="blog_name" 
                       value="{{ old('blog_name', $settings->blog_name) }}" required>
                @error('blog_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">This will appear in the navigation bar and page titles</small>
            </div>
            
            <div class="mb-3">
                <label for="blog_author" class="form-label">Default Author</label>
                <input type="text" class="form-control @error('blog_author') is-invalid @enderror" 
                       id="blog_author" name="blog_author" 
                       value="{{ old('blog_author', $settings->blog_author) }}">
                @error('blog_author')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">Default author name for new posts</small>
            </div>
        </div>
        
        <div class="settings-section">
            <h5><i class="fas fa-search me-2"></i>SEO Settings</h5>
            <p>Optimize your blog for search engines</p>
            
            <div class="mb-3">
                <label for="blog_description" class="form-label">Blog Description</label>
                <textarea class="form-control @error('blog_description') is-invalid @enderror" 
                          id="blog_description" name="blog_description" rows="3"
                          maxlength="500">{{ old('blog_description', $settings->blog_description) }}</textarea>
                @error('blog_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">A brief description of your blog (appears in search engine results)</small>
            </div>
            
            <div class="mb-3">
                <label for="blog_keywords" class="form-label">Keywords</label>
                <input type="text" class="form-control @error('blog_keywords') is-invalid @enderror" 
                       id="blog_keywords" name="blog_keywords" 
                       value="{{ old('blog_keywords', $settings->blog_keywords) }}">
                @error('blog_keywords')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">Comma-separated keywords for your blog (e.g., blog, laravel, web development)</small>
            </div>
        </div>
        
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn-save">
                <i class="fas fa-save me-2"></i>Save Settings
            </button>
        </div>
    </form>
</div>
@endsection
