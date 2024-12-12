<div>
    <form action="{{ route('login') }}" method="post">

        <div class="container">
            <label for="uname"><b>E-mail</b></label>
            <input type="text" placeholder="Enter E-mail" name="email" required>
            <button type="submit">Login</button>
        </div>
    </form>
</div>
