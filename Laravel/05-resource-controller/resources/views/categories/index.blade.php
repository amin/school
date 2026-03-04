@include('errors')

@foreach ($categories as $category)
    @include('categories.show')
@endforeach

@include('categories.create')