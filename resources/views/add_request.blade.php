@extends('layout')

@section('title') Add Incident @endsection

@section('main_content')
    <h1>Incident Created Form</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" enctype="multipart/form-data" action="/request/add/check">
        @csrf
        <input type="text" name="name" id="name" placeholder="Enter your name" class="form-control"><br>
        <input type="text" name="secondName" id="secondName" placeholder="Enter your second name" class="form-control"><br>
        <input type="text" name="place" id="place" placeholder="Enter where you live" class="form-control"><br>
        <input type="text" name="desc" id="desc" placeholder="Tell us about yourself" class="form-control"><br>
        <button type="submit" class="btn btn-success">Send</button>
    </form>
@endsection


{{--//<input type="text" name="country" id="country" placeholder="Enter country incident" class="form-control">--}}
