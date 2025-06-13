@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Movies</h1>

    @if(session('success'))
        <div style="color:green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('movies.create') }}">Add New Movie</a>

    @if($movies->count())
        <table border="1" cellpadding="8" cellspacing="0" style="margin-top: 10px;">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Director</th>
                    <th>Year</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($movies as $movie)
                <tr>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->director ?? '-' }}</td>
                    <td>{{ $movie->release_year ?? '-' }}</td>
                    <td>{{ Str::limit($movie->description, 50) ?? '-' }}</td>
                    <td>
                        <a href="{{ route('movies.edit', $movie) }}">Edit</a> |
                        <form action="{{ route('movies.destroy', $movie) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this movie?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none; border:none; color:red; cursor:pointer;">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No movies found.</p>
    @endif
</div>
@endsection
