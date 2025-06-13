@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Movie</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('movies.update', $movie) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Title:</label>
            <input type="text" name="title" value="{{ old('title', $movie->title) }}" required>
        </div>
        <div>
            <label>Director:</label>
            <input type="text" name="director" value="{{ old('director', $movie->director) }}">
        </div>
        <div>
            <label>Release Year:</label>
            <input type="number" name="release_year" value="{{ old('release_year', $movie->release_year) }}">
        </div>
        <div>
            <label>Description:</label>
            <textarea name="description">{{ old('description', $movie->description) }}</textarea>
        </div>
        <div>
            <button type="submit">Update Movie</button>
            <a href="{{ route('movies.index') }}">Cancel</a>
        </div>
    </form>