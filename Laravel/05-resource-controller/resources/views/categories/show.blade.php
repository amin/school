<div class="category">
<div class="category-name">
    <a style="color: black" href="{{route('categories.show', ['category' => $category->id])}}">{{$category->name}}</a>
    <a href="{{route('categories.edit', ['category' => $category->id])}}">Edit</a>

    <form style="display: inline-block;" action="{{route('categories.destroy', ['category' => $category->id])}}" method="post">
    @csrf
    @method('DELETE')
    <button style="cursor:pointer; display:inline-block;" type="submit">Delete</button>
    </form>
</div>
</div>