@extends('layouts.adminApp')

@section('title', 'Edit Category')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h4>Edit Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('category.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Category Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-warning">Update Category</button>
                <a href="{{ route('category.index') }}" class="btn btn-secondary">Back to Categories</a>
            </form>
        </div>
    </div>
</div>
@endsection
