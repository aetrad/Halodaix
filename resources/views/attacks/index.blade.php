@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Attacks</h1>
    <a href="{{ route('attacks.create') }}" class="btn btn-primary">Add Attack</a>
    <ul>
        @foreach ($attacks as $attack)
            <li>
                <a href="{{ route('attacks.show', $attack->id) }}">{{ $attack->name }}</a>
                <a href="{{ route('attacks.edit', $attack->id) }}">Edit</a>
                <form action="{{ route('attacks.destroy', $attack->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
