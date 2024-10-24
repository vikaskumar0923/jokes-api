<h1>Edit Joke</h1>
<form action="{{ route('jokes.update', $joke) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Setup:</label>
    <input type="text" name="setup" value="{{ $joke->setup }}" required>
    <label>Punchline:</label>
    <input type="text" name="punchline" value="{{ $joke->punchline }}" required>
    <button type="submit">Update Joke</button>
</form>
