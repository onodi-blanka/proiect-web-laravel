@extends('layout')

@section('content')

    <h1 class="home-name">Welcome to the HomePage</h1>
    <div class="events-container">        
    <div class="accordion" id="accordionExample">
    @isset ($events)
        @forelse ($events as $event)
            <div class="card">
                <div class="card-header" id="heading{{ $event->id }}"data-toggle="collapse" data-target="#collapse{{ $event->id }}" aria-expanded="true" aria-controls="collapse{{ $event->id }}">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" >
                            {{ $event->nume }}
                            </button>
                        </h2>
                        {{ $event->descriere }}
                </div>

                <div id="collapse{{ $event->id }}" class="collapse" aria-labelledby="heading{{ $event->id }}" data-parent="#accordionExample">
                    <div class="card-body">
                        <h5>Location:</h5>
                        <span>{{ $event->locatie }}</span>
                        <h5>Date:</h5>
                        <span>{{ $event->data }}</span>
                        <h5>Price:</h5>
                        <span>{{ $event->price }}</span>
                        <h4>Agenda:</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Start time</th>
                                    <th>End time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($event->agenda as $agendaItem)
                                    <tr>
                                        <td>{{ $agendaItem->title }}</td>
                                        <td>{{ $agendaItem->description }}</td>
                                        <td>{{ $agendaItem->start_time }}</td>
                                        <td>{{ $agendaItem->end_time }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <h4>Sponsors and partners:</h4>
                        <ul>
                            @foreach($event->sponsorspartners as $sponsor)
                                <li>{{ $sponsor->name }}</li>
                            @endforeach
                        </ul>
                        <a href="{{ url('add-to-cart/'.$event->id) }}" class="btn-buy-ticket">Buy Ticket</a>
                    </div>
                </div>
            </div>
        @empty
            <p>No events here</p>
        @endforelse
    @endisset
</div>
    </div>

@endsection
