@extends('layout')

@section('content')
    <div class="container mt-5">
        <div class="panel-heading">
            View event
        </div>

        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('events.index') }}">Back</a>
            </div>
            <div class="form-group">
                <strong>Name: </strong> {{ $event->nume }}
            </div>
            <div class="form-group">
                <strong>Description: </strong> {{ $event->descriere }}
            </div>
            <div class="form-group">
                <strong>Location: </strong> {{ $event->locatie }}
            </div>
            <div class="form-group">
                <strong>Date: </strong> {{ $event->data }}
            </div>
            <div class="form-group">
                <strong>Price: </strong> {{ $event->price }}
            </div>
        </div>
    </div>
@endsection
