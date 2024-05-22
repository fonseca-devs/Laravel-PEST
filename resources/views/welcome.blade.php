<form action="{{ route('comments.store', ['post' => 1]) }}" method="POST">
    @csrf
    <div>
        <label for="body">Comentário:</label>
        {{ $user }}
        <textarea id="body" name="body" required></textarea>
    </div>
    <button type="submit">Adicionar Comentário</button>
</form>
