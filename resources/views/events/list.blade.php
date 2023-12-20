@extends('layout')

@section('content')
    <div class="container mt-5">
        <h1>Events</h1>
        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    @admin
                    <a href="/events/create" class="btn btn-primary">Add new event</a>
                    @endadmin
                </div>
            </div>

            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">No</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Price</th>
                    <th width="300">Actions</th>
                </tr>

                @if(isset($events) && count($events) > 0)
                    @foreach($events as $key => $event)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $event->nume }}</td>
                            <td>{{ $event->descriere }}</td>
                            <td>{{ $event->locatie }}</td>
                            <td>{{ $event->data }}</td>
                            <td>{{ $event->price }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('events.show',$event->id) }}">Visualise</a>
                                @admin
                                <a class="btn btn-primary" href="{{ route('events.edit',$event->id) }}">Modify</a>
                                {{ Form::open(['method' => 'DELETE','route' => ['events.destroy', $event->id],'style'=>'display:inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                                @endadmin
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">There are no events!</td>
                    </tr>
                @endif
            </table>

            {{ $events->render() }}
        </div>
    </div>
@endsection