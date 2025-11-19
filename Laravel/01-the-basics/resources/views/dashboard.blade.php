<p>Hello {{ $user->name }}!</p>
<form method="POST" action="/logout">
    @csrf
    <button type="submit">Logout</button>
</form>