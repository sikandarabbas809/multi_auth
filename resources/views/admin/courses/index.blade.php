@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Courses</h1>
        <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">Create Course</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->description }}</td>
                        <td>
                            <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.courses.delete', $course) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this course?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
