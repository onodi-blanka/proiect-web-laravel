@extends('layout')


@section('content')
    {{auth()->user()->isAdmin}}
    @admin

    @endadmin
    @isset ($events)
        <h2>Select an event to see it's agenda</h2>
        <div class="agenda-event-list">
            <div class="agenda-event-item">
                <h4>ID</h4>
                <h4>Name</h4>
                <h4 style="flex-basis: 40%">Action</h4>
            </div>
        </div>
        <div class="agenda-event-list">
            @foreach($events as $event)
                <div class="agenda-event-item">
                    <h4>{{$event->id}}</h4>
                    <h4>{{$event->nume}}</h4>
                    <div style="flex-basis: 40%">
                        @admin
                        <a class="btn btn-primary" href="{{ route('agenda.create',$event->id) }}">Create activity</a>
                        @endadmin
                        <a class="btn btn-primary" href="{{ route('agenda.show',$event->id) }}">View agenda</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endisset
@endsection
