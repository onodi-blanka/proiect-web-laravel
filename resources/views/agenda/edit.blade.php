@extends('layout')

@section('content')

    <div>Pag de edit</div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit activity
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

            {{ Form::open(array('url' => route('agenda.modify', ['agendaId' => $agenda->id]), 'method' => 'PATCH')) }}
            <div class="form-group">
                <label for="nume">Titlu</label>
                <input type="text" name="title" class="form-control" value="{{ $agenda->title}}">
            </div>
            <div class="form-group">
                <label for="descriere">Descriere</label>
                <textarea name="description" class="form-control" rows="3">{{$agenda->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="data">Start time</label>
                <input type="date" name="startDate" class="form-control" value={{ \Carbon\Carbon::parse($agenda->start_time)->format('Y-m-d') }}>
            </div>
            <div class="form-group">
                <label for="data">End time</label>
                <input type="date" name="endDate" class="form-control" value="{{ \Carbon\Carbon::parse($agenda->end_time)->format('Y-m-d') }}">
            </div>
            <div class="form-group">
                <input type="submit" value="Save" class="btn btn-info">
                <a href="{{ route('agenda') }}" class="btn btndefault">Cancel</a>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
