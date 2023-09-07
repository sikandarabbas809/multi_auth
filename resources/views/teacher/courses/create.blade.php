@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Course</h1>
        <form method="POST" action="{{ route('teacher.courses.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Course</button>
        </form>
    </div>
@endsection
