<h1>All Jokes</h1>
<a href="{{ route('jokes.create') }}">Add New Joke</a>
<table border="1" cellpadding="15" cellspacing="0">
    <thead>
        <tr>
            <th>Type</th>
            <th>Setup</th>
            <th>Punchline</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jokes as $joke)
        <tr>
            <td>{{ $joke->type }}</td>
            <td>{{ $joke->setup }}</td>
            <td>{{ $joke->punchline }}</td>
            <td>
                <a href="{{ route('jokes.edit', $joke) }}">Edit</a>
                <form action="{{ route('jokes.destroy', $joke) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
