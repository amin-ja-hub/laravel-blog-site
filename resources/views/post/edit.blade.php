@extends('layouts.adminApp')

@section('title', 'Edit Post')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h4>Edit Post</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Post Title -->
                <div class="mb-3">
                    <label for="title" class="form-label">Post Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" required>
                </div>

                <!-- Post Content -->
                <div class="mb-3">
                    <label for="content" class="form-label">Post Content</label>
                    <textarea name="content" id="content" class="form-control" rows="5" required>{{ $post->content }}</textarea>
                </div>

                <!-- Existing Image Preview -->
                @if($post->image)
                    <div class="mb-3">
                        <label class="form-label">Current Image</label><br>
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-thumbnail" width="200">
                    </div>
                @endif

                <!-- Image Upload -->
                <div class="mb-3">
                    <label for="image" class="form-label">Upload New Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <!-- Category Selection -->
                <div class="mb-3">
                    <label for="category_id" class="form-label">Select Category</label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Publish Toggle -->
                <div class="mb-3 form-check form-switch">
                    <input type="hidden" name="publish" value="0">
                    <input type="checkbox" class="form-check-input" name="publish" id="publish" value="1" {{ $post->publish ? 'checked' : '' }}>
                    <label class="form-check-label" for="publish">Publish this post</label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-warning">Update Post</button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
            </form>
        </div>
    </div>
</div>
@endsection
