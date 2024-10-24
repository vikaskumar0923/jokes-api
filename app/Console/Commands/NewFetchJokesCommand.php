<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Joke;
use Illuminate\Support\Facades\Http;


class NewFetchJokesCommand extends Command
{
    protected $signature = 'fetch:jokes';
    protected $description = 'Fetch a random joke and store it in the database';

    public function handle()
    {
        $response = Http::get('https://official-joke-api.appspot.com/random_joke');
        $jokeData = $response->json();

        if ($jokeData) {
            Joke::create([
                 'type' => $jokeData['type'],
                'setup' => $jokeData['setup'],
                'punchline' => $jokeData['punchline'],
            ]);
            $this->info('Joke saved successfully.');
        } else {
            $this->error('Failed to fetch joke.');
        }
    }
}
