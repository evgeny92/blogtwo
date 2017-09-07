@extends('layouts.main')

@section('title', '| Contact')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Contact Me</h1>
            <hr>
            <form action="{{ url('contact') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label name="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>

                <div class="form-group">
                    <label name="subject">Subject:</label>
                    <input type="text" name="subject" id="subject" class="form-control">
                </div>

                <div class="form-group">
                    <label name="notice">Notice:</label>
                    <textarea name="notice" id="notice" class="form-control"></textarea>
                </div>

                <input type="submit" value="Send Message" class="btn btn-success">

            </form>
        </div>
    </div>
@endsection