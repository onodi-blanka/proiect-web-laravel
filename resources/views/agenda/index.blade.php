@extends('layout')

@section('content')
    <h2 class="agenda_index_title">Select an event to see its agenda</h2>

    @isset($events)
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->nume }}</td>
                    <td>
                        @admin
                        <a class="btn btn-dark" href="{{ route('agenda.create', $event->id) }}">Create activity</a>
                        @endadmin
                        <a class="btn btn-dark" href="{{ route('agenda.show', $event->id) }}">View agenda</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endisset
@endsection
