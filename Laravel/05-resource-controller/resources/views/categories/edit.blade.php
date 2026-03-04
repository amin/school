@include('errors')

<form action="{{route('categories.update', ['category' => $category->id])}}" method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" placeholder="{{$category->name}}">
    <button type="submit">Edit category</button>
    @csrf
    @method('patch')
</form>