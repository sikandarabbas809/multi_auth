@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Student Courses</h1>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
