@extends('layout')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Modify event details
        </div>
        <div class="panel-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Eroare:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::model($event, ['method' => 'PATCH', 'route' => ['events.update', $event->id]]) !!}
                <div class="form-group">
                    <label for="nume">Name</label>
                    <input type="text" name="nume" class="form-control" value="{{ $event->nume }}">
                </div>
                <div class="form-group">
                    <label for="descriere">Description</label>
                    <textarea name="descriere" class="form-control" rows="3">{{ $event->descriere }}</textarea>
                </div>
                <div class="form-group">
                    <label for="locatie">Location</label>
                    <input type="text" name="locatie" class="form-control" value="{{ $event->locatie }}">
                </div>
                <div class="form-group">
                    <label for="data">Date</label>
                    <input type="date" name="data" class="form-control" value="{{ $event->data }}">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" value="{{ $event->price }}">
                </div>
                <div class="form-group">
                    <input type="submit" value="Save" class="btn btn-info">
                    <a href="{{ route('events.index') }}" class="btn btndefault">Cancel</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection