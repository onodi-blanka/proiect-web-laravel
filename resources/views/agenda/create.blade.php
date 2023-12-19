@extends('layout')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Errors:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{ Form::open(['route' => ['agenda.store', 'event' => $eventId], 'method' => 'POST']) }}
                <div class="form-group">
                    {{ Form::label('title', 'Titlu', ['class' => 'font-weight-bold']) }}
                    {{ Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Enter title']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('description', 'Descriere', ['class' => 'font-weight-bold']) }}
                    {{ Form::textarea('description', old('description'), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Enter description']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('startDate', 'Start time', ['class' => 'font-weight-bold']) }}
                    {{ Form::input('datetime-local', 'startDate', old('startDate'), ['class' => 'form-control', 'placeholder' => 'Start time']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('endDate', 'End time', ['class' => 'font-weight-bold']) }}
                    {{ Form::input('datetime-local', 'endDate', old('endDate'), ['class' => 'form-control', 'placeholder' => 'End time']) }}
                </div>
                <div class="form-group">
                    {{ Form::button('Add activity', ['type' => 'submit', 'class' => 'btn btn-dark']) }}
                    <a href="{{ route('agenda') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
