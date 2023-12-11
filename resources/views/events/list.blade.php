@extends('layout')

@section('content')
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            Event list
        </div>

        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    <a href="/events/create" class="btn btn-default">Add new event</a>
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
                                <a class="btn btn-primary" href="{{ route('events.edit',$event->id) }}">Modify</a>
                                {{ Form::open(['method' => 'DELETE','route' => ['events.destroy', $event->id],'style'=>'display:inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btndanger']) }}
                                {{ Form::close() }}
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