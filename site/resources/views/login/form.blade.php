<div>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Envoyer</button>
    </form>
</div>
