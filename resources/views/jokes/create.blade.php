<h1>Add New Joke</h1>
<form action="{{ route('jokes.store') }}" method="POST">
    @csrf
    <label>Setup:</label>
    <input type="text" name="setup" required>
    <label>Punchline:</label>
    <input type="text" name="punchline" required>
    <button type="submit">Save Joke</button>
</form>
