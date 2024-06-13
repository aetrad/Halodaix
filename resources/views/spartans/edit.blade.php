@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Spartan</h1>
    <form action="{{ route('spartans.update', $spartan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $spartan->name }}" required>
        </div>
        <div class="form-group">
            <label for="pv">PV:</label>
            <input type="number" name="pv" id="pv" class="form-control" value="{{ $spartan->pv }}" required>
        </div>
        <div class="form-group">
            <label for="weight">Weight:</label>
            <input type="number" step="0.01" name="weight" id="weight" class="form-control" value="{{ $spartan->weight }}" required>
        </div>
        <div class="form-group">
            <label for="height">Height:</label>
            <input type="number" step="0.01" name="height" id="height" class="form-control" value="{{ $spartan->height }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
