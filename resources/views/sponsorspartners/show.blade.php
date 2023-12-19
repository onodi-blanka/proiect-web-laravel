@extends('layout')

@section('content')
    <div class="container mt-5">
        <h1>{{ $sponsorPartner->name }}</h1>
        <div style="display: flex; align-items: flex-start; margin-top:40px">
        <div style="flex: 1;">
            <p>{{ $sponsorPartner->details }}</p>
        </div>
        <div style="margin-left: auto;margin-top:-100px">
            @php
                $imagePath = 'storage/' . $sponsorPartner->logo_path;
            @endphp
            <img src="{{ asset($imagePath) }}" alt="Logo" style="width: 20vw; height: 20vw; max-width: 130px; max-height: 130px;  border: 2px solid black;">
        </div>
        </div>


        <div style="margin-top: 40px;">
            <a href="{{ route('sponsorspartners.edit', $sponsorPartner->id) }}" class="btn btn-primary" style="background-color: rgb(73, 71, 71);margin-right:10px">Modify</a>
            <form action="{{ route('sponsorspartners.destroy', $sponsorPartner->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" style="background-color: rgb(73, 71, 71);" onclick="return confirm('Are you sure you want to delete this sponsor?')">Delete</button>
            </form>
        </div>
    </div>
@endsection
