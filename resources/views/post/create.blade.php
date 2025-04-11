@extends('layouts.adminApp')

@section('title', 'Create New Post')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Create a New Post</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Post Title -->
                <div class="mb-3">
                    <label for="title" class="form-label">Post Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter post title" required>
                </div>

                <!-- Post Content -->
                <div class="mb-3">
                    <label for="content" class="form-label">Post Content</label>
                    <textarea name="content" id="content" class="form-control" rows="5" placeholder="Write your post here..." required></textarea>
                </div>

                <!-- Image Upload -->
                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <!-- Category Selection -->
                <div class="mb-3">
                    <label for="category_id" class="form-label">Select Category</label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        <option value="" disabled selected>Choose a category</option>
                        {{-- @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach --}}
                    </select>
                </div>

                <!-- Publish Toggle -->
                <div class="mb-3 form-check form-switch">
                    <input type="checkbox" class="form-check-input" name="publish" id="publish">
                    <label class="form-check-label" for="publish">Publish this post</label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success">Create Post</button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
            </form>
        </div>
    </div>
</div>
@endsection
