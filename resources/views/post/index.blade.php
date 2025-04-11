@extends('layouts.adminApp')

@section('title', 'All Posts')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">All Posts</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Create New Post Button -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
    </div>

    <!-- Posts Table -->
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->created_at->format('Y-m-d') }}</td>
                        <td class="text-center">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('posts.delete', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- No Posts Found Message -->
    @if($posts->isEmpty())
        <div class="alert alert-warning text-center">
            No posts available.
        </div>
    @endif
</div>
@endsection
