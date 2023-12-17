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

                {{ Form::open(['url' => route('agenda.modify', ['agendaId' => $agenda->id]), 'method' => 'PATCH']) }}
                <div class="form-group">
                    {{ Form::label('title', 'Titlu', ['class' => 'font-weight-bold']) }}
                    {{ Form::text('title', $agenda->title, ['class' => 'form-control', 'placeholder' => 'Enter title']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('description', 'Descriere', ['class' => 'font-weight-bold']) }}
                    {{ Form::textarea('description', $agenda->description, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Enter description']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('startDate', 'Start time', ['class' => 'font-weight-bold']) }}
                    {{ Form::datetimeLocal('startDate', \Carbon\Carbon::parse($agenda->start_time)->format('Y-m-d\TH:i'), ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('endDate', 'End time', ['class' => 'font-weight-bold']) }}
                    {{ Form::datetimeLocal('endDate', \Carbon\Carbon::parse($agenda->end_time)->format('Y-m-d\TH:i'), ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::submit('Save', ['class' => 'btn btn-dark']) }}
                    <a href="{{ route('agenda') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
