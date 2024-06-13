@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Attack</h1>
    <form action="{{ route('attacks.update', $attack->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $attack->name }}" required>
        </div>
        <div class="form-group">
            <label for="damage">Damage:</label>
            <input type="number" name="damage" id="damage" class="form-control" value="{{ $attack->damage }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ $attack->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="type_id">Type:</label>
            <select name="type_id" id="type_id" class="form-control">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $type->id == $attack->type_id ? 'selected' : '' }}>{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
