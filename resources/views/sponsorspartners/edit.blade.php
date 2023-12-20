@extends('layout')

@section('content')

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Error:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

<div class="container mt-5" style="overflow-y: auto; margin-bottom: 50px;">

            <h3>Modify Sponsor/Partner Details</h3>

            <form method="POST" action="{{ route('sponsorspartners.update', $sponsorPartner->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $sponsorPartner->name }}">
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select name="type" id="type" class="form-control">
                        <option value="sponsor" {{ $sponsorPartner->type === 'sponsor' ? 'selected' : '' }}>sponsor</option>
                        <option value="partner" {{ $sponsorPartner->type === 'partner' ? 'selected' : '' }}>partner</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="details">Details</label>
                    <textarea name="details" id="details" class="form-control" rows="3">{{ $sponsorPartner->details }}</textarea>
                </div>
                <div class="form-group">
                    <label for="logo">Logo</label>
                    <input type="file" name="logo" id="logo" class="form-control">
                </div>

                <div class="form-group">
                    <label for="event">Event</label>
                    <select name="event_id" id="event_id">
                        @foreach($events as $event)
                            <option value="{{ $event->id }}">{{ $event->nume }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-info">
                        <a href="{{ route('sponsorspartners.index') }}" class="btn btn-default">Cancel</a>
                </div>
            </form>
</div>
@endsection

