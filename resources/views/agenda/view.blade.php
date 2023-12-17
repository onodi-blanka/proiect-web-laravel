@extends('layout')


@section('content')
    <a class="btn btn-primary" href="{{ route('agenda') }}">Back</a>
    @if(count($agenda) > 0)
        <h2>Activities: </h2>
        @foreach($agenda as $activity)
            <div class="agenda-item">
                <h4>{{ $activity->title }}</h4>
                <p>{{ $activity->description }}</p>
                <p>Starts: {{ $activity->start_time }}</p>
                <p>Ends: {{ $activity->end_time }}</p>
                @admin
                <a class="btn btn-primary" href="{{ route('agenda.edit',$activity->id) }}">Modify activity</a>
                {{ Form::open(['method' => 'DELETE','route' => ['agenda.delete', $activity->id],'style'=>'display:inline']) }}
                {{ Form::submit('Delete', ['class' => 'btn btndanger']) }}
                {{ Form::close() }}
                @endadmin
            </div>
        @endforeach
    @else
        <div>No agenda for this event</div>
    @endisset

@endsection
