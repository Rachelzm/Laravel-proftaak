@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Movie</h1>

    @if($errors->any())
        <div style="color:red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('movies.store') }}" method="POST">
        @csrf
        <label>Title:</label><br>
        <input type="text" name="title" value="{{ old('title') }}" required><br><br>

        <label>Director:</label><br>
        <input type="text" name="director" value="{{ old('director') }}"><br><br>

        <label>Release Year:</label><br>
        <input type="number" name="release_year" value="{{ old('release_year') }}" min="1800" max="{{ date('Y') }}"><br><br>

        <label>Description:</label><br>
        <textarea name="description">{{ old('description') }}</textarea><br><br>

        <button type="submit">Add Movie</button>
    </form>

    <br>
    <a href="{{ route('movies.index') }}">Back to list</a>
</div>
@endsection
