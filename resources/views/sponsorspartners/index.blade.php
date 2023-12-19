@extends('layout')

@section('content')

<div class="container mt-5" style= "overflow-y: auto;">
    <h1>Sponsors & Partners</h1>
    <div style="margin-top: 50px">
        <h2>Sponsors</h2>
        <table class="table">
            <thead  style="width: 100%; table-layout: fixed;">
                <tr>
                    <th style="width: 33.33%; text-align: left;">Name</th>
                    <th style="width: 33.33%; text-align: left;">Details</th>
                    <th style="width: 33.33%; text-align: left;">Logo</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($sponsors) && count($sponsors) > 0)
                @foreach($sponsors as $key => $sponsor)
                    <tr>
                        <td>
                            <a href="{{ route('sponsorspartners.show', $sponsor['id']) }}">
                                {{ $sponsor['name'] }}
                            </a>
                        </td>
                        <td>{{ $sponsor['details'] }}</td>
                        <td>
                            @php
                                $imagePath = 'storage/' . $sponsor['logo_path'];
                            @endphp
                            <img src="{{ asset($imagePath) }}" alt="Logo" width="50" height="50">
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">For the moment, there are no sponsors</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>

    <div>
        <h2>Partners</h2>
        <table class="table">
            <thead  style="width: 100%; table-layout: fixed;">
                <tr>
                    <th style="width: 33.33%; text-align: left;">Name</th>
                    <th style="width: 33.33%; text-align: left;">Details</th>
                    <th style="width: 33.33%; text-align: left;">Logo</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($partners) && count($partners) > 0)
                @foreach($partners as $key => $partner)
                    <tr>
                        <td>
                            <a href="{{ route('sponsorspartners.show', $partner['id']) }}">
                                {{ $partner['name'] }}
                            </a>
                        </td>
                        <td>{{ $partner['details'] }}</td>
                        <td>
                            @php
                                $imagePath = 'storage/' . $partner['logo_path'];
                            @endphp
                            <img src="{{ asset($imagePath) }}" alt="Logo" width="50" height="50">
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">For the moment, there are no partners</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>

        <div style="margin-bottom: 100px; ">
            <h4>Do you want to be part of this magical experience?</h4>
            <p><a href="/sponsorspartners/create">Click here to join us.</a></p>
        </div>
</div>
@endsection

