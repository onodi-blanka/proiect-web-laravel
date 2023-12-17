@extends('layout')

@section('content')
    <div class="container mt-4">
        <a class="btn btn-dark mb-3" href="{{ route('agenda') }}">Back</a>

        @if(count($agenda) > 0)
            <h2 class="mb-3">Activities:</h2>
            <table class="table">
                <thead>
                <tr>
                    <th>Activity Name</th>
                    <th>Description</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    @admin
                    <th>Action</th>
                    @endadmin
                </tr>
                </thead>
                <tbody>
                @foreach($agenda as $activity)
                    <tr>
                        <td>{{ $activity->title }}</td>
                        <td>{{ $activity->description }}</td>
                        <td>{{ $activity->start_time }}</td>
                        <td>{{ $activity->end_time }}</td>
                        <td>
                            @admin
                            <a class="btn btn-dark" href="{{ route('agenda.edit',$activity->id) }}">Modify</a>
                            {{ Form::open(['method' => 'DELETE','route' => ['agenda.delete', $activity->id],'style'=>'display:inline']) }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-dark btn-delete']) }}
                            {{ Form::close() }}
                            @endadmin
                        </td>
                    </tr>
    @endforeach
    @else
        <div>No agenda for this event</div>
    @endisset

@endsection
