@include('errors')
<p>Hello {{ $user->name }}!</p>
<form method="POST" action="/logout">
    @csrf
    <button type="submit">Logout</button>
</form>

<form action="/tasks" method="post">
    <input type="text" name="description">
    <input type="submit" value="Create task">

    <select name="category_id">
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
@csrf
</form>


@if ($user->tasks())
<ul>
    @foreach ($user->tasks as $task)
        @if($task->completed)
            <li><s>{{ $task->description }}</s>
                <form style="display:inline-block" action="/tasks/{{$task->id}}/open" method="post">
                    @csrf
                    @method('patch')
                    <input type="submit" value="Open task">
                </form>
                <form style="display:inline-block" action="/tasks/{{$task->id}}/delete" method="post">
                    @csrf
                    @method('patch')
                    <input type="submit" value="Delete task">
                </form>
            </li>
        @else
            <li>{{ $task->description }}
                <form style="display:inline-block" action="/tasks/{{$task->id}}/complete" method="post">
                    @csrf
                    @method('patch')
                    <input type="submit" value="Close task">
                </form>
                <form style="display:inline-block" action="/tasks/{{$task->id}}/delete" method="post">
                    @csrf
                    @method('patch')
                    <input type="submit" value="Delete task">
                </form>
            </li>
        @endif
    @endforeach
</ul>
@endif