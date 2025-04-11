@extends('layouts.adminApp')

@section('title', 'Create Category')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Create New Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf

                <!-- Category Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter category name" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success">Create Category</button>
                <a href="{{ route('category.index') }}" class="btn btn-secondary">Back to Categories</a>
            </form>
        </div>
    </div>
</div>
@endsection
