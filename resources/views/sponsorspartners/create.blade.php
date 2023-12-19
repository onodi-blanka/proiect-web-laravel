@extends('layout')

@section('content')


            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Errors:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

<div class="container mt-5" style="overflow-y: auto; margin-bottom: 50px;">

            {{ Form::open(array('route' => 'sponsorspartners.store','method'=>'POST', 'enctype' => 'multipart/form-data')) }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select name="type" class="form-control">
                        <option value="sponsor">sponsor</option>
                        <option value="partner">partner</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="details">Details</label>
                    <textarea name="details" class="form-control" rows="3">{{ old('details') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="logo">Logo</label>
                    <input type="file" name="logo" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" value="Add" class="btn btn-info">
                    <a href="{{ route('sponsorspartners.index') }}" class="btn btn-default">Cancel</a>
                </div>
            {{ Form::close() }}
</div>
@endsection
