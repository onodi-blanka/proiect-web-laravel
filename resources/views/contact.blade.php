@extends('layout')

@section('content')


    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container mt-5">
        <h1>Contact Us</h1>
        <p>We'd love to hear from you. Please fill out the form below to get in touch with us.</p>

        <form method="POST" action="{{url('contact')}}">
            @csrf <!-- Add a CSRF token for security -->

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Your email">
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="message" rows="4" placeholder="Your message"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
