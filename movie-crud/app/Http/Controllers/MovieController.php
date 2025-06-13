<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    // Show all movies
public function index()
{
    $movies = Movie::all();
    return view('movies.index', compact('movies'));
}

    // Show form to create a new movie
    public function create()
    {
        return view('movies.create');
    }

    // Store a new movie
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'director' => 'nullable|string|max:255',
            'release_year' => 'nullable|integer|digits:4',
            'description' => 'nullable|string',
        ]);

        Movie::create($validated);

        return redirect()->route('movies.index')->with('success', 'Movie created successfully.');
    }

    // Show a single movie (optional)
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    // Show form to edit an existing movie
    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    // Update the movie
    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'director' => 'nullable|string|max:255',
            'release_year' => 'nullable|integer|digits:4',
            'description' => 'nullable|string',
        ]);

        $movie->update($validated);

        return redirect()->route('movies.index')->with('success', 'Movie updated successfully.');
    }

    // Delete a movie
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully.');
    }
}
