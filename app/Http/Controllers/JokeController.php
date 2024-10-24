<?php
namespace App\Http\Controllers;

use App\Models\Joke;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JokeController extends Controller
{
    // Fetch data from API and store it in the database
    public function fetchAndStoreJoke()
    {
        $response = Http::get('https://official-joke-api.appspot.com/random_joke');
        if ($response->successful()) {
            $jokeData = $response->json();
            Joke::create([
			    'type' => $jokeData['type'],
                'setup' => $jokeData['setup'],
                'punchline' => $jokeData['punchline']
            ]);
        }
		return view('jokes.db');
       // return redirect()->route('jokes.index')->with('success', 'Joke fetched and stored successfully.');
    }

    // List all jokes
    public function index()
    {
        $jokes = Joke::all();
        return view('jokes.index', compact('jokes'));
    }

    // Show form to create a new joke
    public function create()
    {
        return view('jokes.create');
    }

    // Store a new joke in the database
    public function store(Request $request)
    {
        $request->validate([
            'setup' => 'required|string|max:255',
            'punchline' => 'required|string|max:255',
        ]);

        Joke::create($request->all());

        return redirect()->route('jokes.index')->with('success', 'Joke created successfully.');
    }

    // Show form to edit an existing joke
    public function edit(Joke $joke)
    {
        return view('jokes.edit', compact('joke'));
    }

    // Update an existing joke
    public function update(Request $request, Joke $joke)
    {
        $request->validate([
            'setup' => 'required|string|max:255',
            'punchline' => 'required|string|max:255',
        ]);

        $joke->update($request->all());

        return redirect()->route('jokes.index')->with('success', 'Joke updated successfully.');
    }

    // Delete an existing joke
    public function destroy(Joke $joke)
    {
        $joke->delete();

        return redirect()->route('jokes.index')->with('success', 'Joke deleted successfully.');
    }
}
