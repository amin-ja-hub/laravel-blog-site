@extends('layouts.adminApp')

@section('title', 'Create New Post')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Create a New Post</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Post Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label fw-bold">Post Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter post title" required value="{{ old('title') }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Post Content -->
                        <div class="mb-3">
                            <label for="content" class="form-label fw-bold">Post Content</label>
                            <textarea name="content" id="content" class="form-control" rows="5" placeholder="Write your post here..." required>{{ old('content') }}</textarea>
                            @error('content')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-3">
                            <label for="image" class="form-label fw-bold">Upload Image</label>
                            <input type="file" name="image" id="image" class="form-control" onchange="previewImage(event)">
                            <img id="imagePreview" class="img-thumbnail mt-2 d-none" width="150">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Category Selection -->
                        <div class="mb-3">
                            <label for="category_id" class="form-label fw-bold">Select Category</label>
                            <select name="category_id" id="category_id" class="form-select" required>
                                <option value="" disabled selected>Choose a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Publish Toggle -->
                        <div class="mb-3 form-check form-switch">
                            <input type="hidden" name="publish" value="0">
                            <input type="checkbox" class="form-check-input" name="publish" id="publish" value="1" {{ old('publish') ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold" for="publish">Publish this post</label>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Create Post</button>
                            <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Back to Posts</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Preview Script -->
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const imagePreview = document.getElementById('imagePreview');
            imagePreview.src = reader.result;
            imagePreview.classList.remove('d-none');
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
