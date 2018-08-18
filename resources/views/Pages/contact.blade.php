@extends('master')

@section('title', '| Contact')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Contact</h1>
        <hr>

        <form method="POST" action="/contact">
            @csrf
            <div class="form-group">
                <label name="email">Email: </label>
                <input id="email" name="email" class="form-control" required inputmode="email
            </div>

            <div class="form-group">
                <label name="subject">Subject: </label>
                <input id="subject" name="subject" class="form-control" required>
            </div>

            <div class="form-group">
                <label name="message">Message: </label>
                <textarea id="message" name="message" class="form-control" placeholder="Type your message here..." required></textarea>
            </div>

            <input type="submit" value="Submit Message" class="btn btn-success">
        </form>
    </div>
</div>
@endsection