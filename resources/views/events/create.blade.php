@extends('layout')
    
@section('content')
    <div class="container mt-5">
        <div class="panel-heading">
            Add new event
        </div>

        <div class="panel-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Errors:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{ Form::open(array('route' => 'events.store','method'=>'POST')) }}
                <div class="form-group">
                    <label for="nume">Name</label>
                    <input type="text" name="nume" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="descriere">Description</label>
                    <textarea name="descriere" class="form-control" rows="3">{{ old('descriere') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="locatie">Location</label>
                    <input type="text" name="locatie" class="form-control" value="{{ old('locatie') }}">
                </div>
                <div class="form-group">
                    <label for="data">Date</label>
                    <input type="date" name="data" class="form-control" value="{{ old('data') }}">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                </div>
                <div class="form-group" style="margin-bottom:50px">
                    <input type="submit" value="Add event" class="btn btn-info">
                    <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection