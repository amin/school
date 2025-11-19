@include('errors')
<form action="{{ route('categories.store')}}" method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name">
    <button type="submit">Create category</button>
    @csrf
</form>