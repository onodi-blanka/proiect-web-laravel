@extends('layout')

@section('content')

    <h1 class="home-name">Welcome to the HomePage</h1>
    <div class="events-container">
        <div class="event-header">
            <span>Event Name</span>
            <span>Event Date</span>
            <span>Action</span>
        </div>
        @isset ($events)
            @forelse ($events as $event)
                <div class="event-listing">
                    <span>{{ $event->nume }}</span>
                    <span>{{ $event->data }}</span>
                    <a href="{{ url('add-to-cart/'.$event->id) }}" class="btn-buy-ticket">Buy Ticket</a>
                </div>
            @empty
                <p>No events here</p>
            @endforelse
        @endisset
    </div>
@endsection
