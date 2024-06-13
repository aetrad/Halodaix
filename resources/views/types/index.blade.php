@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Types</h1>
    <a href="{{ route('types.create') }}" class="btn btn-primary">Add Type</a>
    <ul>
        @foreach ($types as $type)
            <li>
                <a href="{{ route('types.show', $type->id) }}">{{ $type->name }}</a>
                <a href="{{ route('types.edit', $type->id) }}">Edit</a>
                <form action="{{ route('types.destroy', $type->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
