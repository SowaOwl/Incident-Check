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

    <form method="post" action="/incident/add/check">
        @csrf
        <input type="text" name="type" id="type" placeholder="Enter a type of incident" class="form-control"><br>
        <input type="text" name="place" id="place" placeholder="Enter place incident" class="form-control"><br>
        <input type="text" name="name" id="name" placeholder="Enter a name of incident" class="form-control"><br>
        <input type="text" name="coord" id="coord" placeholder="Enter a coordinates of incident" class="form-control"><br>
        <input type="date" name="date" id="date" placeholder="Enter a date of incident" class="form-control"><br>
        <textarea type="text" name="desc" id="desc" placeholder="Enter a Description of incident" class="form-control"></textarea><br>
        <textarea type="text" name="shortDesc" id="shortDesc" placeholder="Enter a Short Description of incident" class="form-control"></textarea><br>
        <button type="submit" class="btn btn-success">Send</button>
    </form>
@endsection
